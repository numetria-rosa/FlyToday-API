<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baggage Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .baggage-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .service-card {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4">Baggage Information</h1>
        
        <?php
        // === Air/AirBaggages ===

        $baggageData = [
            "Success" => true,
            "Error" => [
                "Id" => "",
                "Message" => ""
            ],
            "BaggageInfoes" => [
                [
                    "Arrival" => "JFK",
                    "Baggage" => "2 x 23kg",
                    "Departure" => "LHR",
                    "FlightNo" => "BA178"
                ],
                [
                    "Arrival" => "CDG",
                    "Baggage" => "1 x 20kg",
                    "Departure" => "LHR",
                    "FlightNo" => "AF1381"
                ],
                [
                    "Arrival" => "DXB",
                    "Baggage" => "2 x 32kg",
                    "Departure" => "LHR",
                    "FlightNo" => "EK001"
                ]
            ],
            "Services" => [
                [
                    "PassengerFirstName" => "John",
                    "PassengerMiddleName" => "Robert",
                    "PassengerLastName" => "Smith",
                    "PassengerPassportNumber" => "P12345678",
                    "PassengerNationalId" => "ID987654",
                    "Description" => "Extra Baggage Allowance",
                    "ServiceId" => "SERV001",
                    "Behavior" => 1,
                    "ServiceCost" => [
                        "Amount" => 75,
                        "Currency" => "USD"
                    ]
                ],
                [
                    "PassengerFirstName" => "Sarah",
                    "PassengerMiddleName" => "Elizabeth",
                    "PassengerLastName" => "Johnson",
                    "PassengerPassportNumber" => "P87654321",
                    "PassengerNationalId" => "ID123456",
                    "Description" => "Priority Baggage Handling",
                    "ServiceId" => "SERV002",
                    "Behavior" => 2,
                    "ServiceCost" => [
                        "Amount" => 50,
                        "Currency" => "USD"
                    ]
                ]
            ]
        ];

        // Baggage Information
        if (!empty($baggageData['BaggageInfoes'])) {
            echo '<div class="row mb-4">';
            echo '<div class="col-12"><h2 class="h4 mb-3">Baggage Rules</h2></div>';
            foreach ($baggageData['BaggageInfoes'] as $baggage) {
                echo '<div class="col-md-4">';
                echo '<div class="card baggage-card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Flight ' . htmlspecialchars($baggage['FlightNo']) . '</h5>';
                echo '<p class="card-text">';
                echo '<strong>Route:</strong> ' . htmlspecialchars($baggage['Departure']) . ' → ' . htmlspecialchars($baggage['Arrival']) . '<br>';
                echo '<strong>Allowance:</strong> ' . htmlspecialchars($baggage['Baggage']);
                echo '</p>';
                echo '</div></div></div>';
            }
            echo '</div>';
        }

        // Services
        if (!empty($baggageData['Services'])) {
            echo '<div class="row">';
            echo '<div class="col-12"><h2 class="h4 mb-3">Additional Services</h2></div>';
            foreach ($baggageData['Services'] as $service) {
                echo '<div class="col-md-6">';
                echo '<div class="card service-card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($service['Description']) . '</h5>';
                echo '<p class="card-text">';
                echo '<strong>Passenger:</strong> ' . htmlspecialchars($service['PassengerFirstName'] . ' ' . $service['PassengerMiddleName'] . ' ' . $service['PassengerLastName']) . '<br>';
                echo '<strong>Passport:</strong> ' . htmlspecialchars($service['PassengerPassportNumber']) . '<br>';
                echo '<strong>National ID:</strong> ' . htmlspecialchars($service['PassengerNationalId']) . '<br>';
                echo '<strong>Cost:</strong> ' . htmlspecialchars($service['ServiceCost']['Amount'] . ' ' . $service['ServiceCost']['Currency']);
                echo '</p>';
                echo '</div></div></div>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
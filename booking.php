<?php
// === Air/AirBookingData ===

require_once __DIR__ . '/api.php';

// Get flight data from POST request
$flightData = isset($_POST['flightData']) ? json_decode($_POST['flightData'], true) : null;

// Sample static booking data with dynamic flight information
$bookingData = [
    "UniqueId" => "BK" . rand(100000000, 999999999),
    "FareType" => 1,
    "BookedBy" => "John Smith",
    "OrderBy" => "John Smith",
    "Error" => null,
    "Success" => true,
    "TktTimeLimit" => date('c', strtotime('+24 hours')),
    "Category" => 10,
    "Status" => 10,
    "RefundMethod" => 0,
    "TravelItinerary" => [
        "ItineraryInfo" => [
            "ItineraryPricing" => [
                "BaseFare" => floatval($_POST['baseFare'] ?? 0),
                "ServiceTax" => 0,
                "TotalTax" => floatval($_POST['totalFare'] ?? 0) - floatval($_POST['baseFare'] ?? 0),
                "TotalFare" => floatval($_POST['totalFare'] ?? 0),
                "TotalCommission" => 0,
                "Currency" => $_POST['currency'] ?? 'USD',
                "PriceRangeDifference" => 0
            ],
            "CustomerInfoes" => [
                [
                    "Customer" => [
                        "Gender" => 1,
                        "PassengerType" => 1,
                        "PassportNumber" => "P12345678",
                        "NationalId" => "N98765432",
                        "Nationality" => "US",
                        "DateOfBirth" => "1990-01-15T00:00:00.000Z",
                        "PassportExpireDate" => "2025-12-31T00:00:00.000Z",
                        "PassportIssueCountry" => "US",
                        "PassportIssueDate" => "2015-12-31T00:00:00.000Z",
                        "PaxName" => [
                            "PassengerFirstName" => "John",
                            "PassengerMiddleName" => "",
                            "PassengerLastName" => "Smith",
                            "PassengerTitle" => 1
                        ]
                    ],
                    "ETickets" => "123-4567890123",
                    "ETicketNumbers" => [
                        [
                            "ETicketNumber" => "123-4567890123",
                            "EticketStatus" => 1,
                            "IsRefunded" => false,
                            "DateOfIssue" => date('c'),
                            "AirlinePnr" => "ABC123",
                            "TotalRefund" => 0
                        ]
                    ]
                ]
            ],
            "ReservationItems" => [],
            "TripDetailPtcFareBreakdowns" => [
                [
                    "PassengerTypeQuantity" => [
                        "PassengerType" => 1,
                        "Quantity" => 1
                    ],
                    "TripDetailPassengerFare" => [
                        "BaseFare" => floatval($_POST['baseFare'] ?? 0),
                        "ServiceTax" => 0,
                        "Tax" => floatval($_POST['totalFare'] ?? 0) - floatval($_POST['baseFare'] ?? 0),
                        "TotalFare" => floatval($_POST['totalFare'] ?? 0),
                        "Commission" => 0,
                        "Currency" => $_POST['currency'] ?? 'USD',
                        "PriceRangeDifference" => 0,
                        "CommissionCashBack" => true
                    ]
                ]
            ],
            "PhoneNumber" => "+1-555-0123",
            "Email" => "john.smith@example.com"
        ],
        "BookingNotes" => [
            [
                "Note" => "Special meal request: Vegetarian",
                "Date" => date('c')
            ]
        ]
    ],
    "ValidatingAirlineCode" => $_POST['airline'] ?? 'AA',
    "DirectionInd" => intval($_POST['directionInd'] ?? 1),
    "OnlineCheckIn" => true,
    "BeforeTravelOnlineCheckingTime" => 24,
    "OnlineCheckingUrl" => "https://www.aa.com/checkin",
    "SeatSelection" => true,
    "BeforeTravelSeatSelectionTime" => 48,
    "SeatSelectionUrl" => "https://www.aa.com/seatselection",
    "AirRemark" => [
        "Special assistance requested"
    ]
];

// Add flight segments to ReservationItems
if ($flightData && isset($flightData['OriginDestinationOptions'])) {
    foreach ($flightData['OriginDestinationOptions'] as $option) {
        if (isset($option['FlightSegments'])) {
            foreach ($option['FlightSegments'] as $segment) {
                $bookingData['TravelItinerary']['ItineraryInfo']['ReservationItems'][] = [
                    "AirEquipmentType" => $segment['OperatingAirline']['Equipment'] ?? 'B737',
                    "AirlinePnr" => "ABC123",
                    "ArrivalAirportLocationCode" => $segment['ArrivalAirportLocationCode'],
                    "ArrivalDateTime" => $segment['ArrivalDateTime'],
                    "ArrivalTerminal" => $segment['ArrivalTerminal'],
                    "Baggage" => $segment['Baggage'],
                    "DepartureAirportLocationCode" => $segment['DepartureAirportLocationCode'],
                    "DepartureDateTime" => $segment['DepartureDateTime'],
                    "DepartureTerminal" => $segment['DepartureTerminal'],
                    "FlightNumber" => $segment['FlightNumber'],
                    "JourneyDuration" => $segment['JourneyDuration'],
                    "JourneyDurationPerMinute" => $segment['JourneyDurationPerMinute'],
                    "MarketingAirlineCode" => $segment['MarketingAirlineCode'],
                    "OperatingAirlineCode" => $segment['OperatingAirline']['Code'],
                    "ResBookDesigCode" => $segment['ResBookDesigCode'],
                    "StopQuantity" => $segment['StopQuantity'],
                    "IsCharter" => $segment['IsCharter'],
                    "IsReturn" => $segment['IsReturn'],
                    "CabinClassCode" => $segment['CabinClassCode']
                ];
            }
        }
    }
}

// Function to format date
function formatDate($dateString) {
    return date('Y-m-d H:i:s', strtotime($dateString));
}

// Function to format currency
function formatCurrency($amount, $currency) {
    return $currency . ' ' . number_format($amount, 2);
}

// Function to get cabin class name
function cabinClassName($code) {
    $map = [
        1 => 'Economy',
        2 => 'Premium Economy',
        3 => 'Business',
        4 => 'First'
    ];
    return $map[$code] ?? 'Unknown';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .section h2 {
            color: #333;
            margin-top: 0;
        }
        .info-row {
            display: flex;
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            width: 200px;
        }
        .value {
            flex: 1;
        }
        .status {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Booking Details</h1>
        
        <div class="section">
            <h2>Booking Information</h2>
            <div class="info-row">
                <span class="label">Booking Reference:</span>
                <span class="value"><?php echo htmlspecialchars($bookingData['UniqueId']); ?></span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="value status"><?php echo $bookingData['Success'] ? 'Confirmed' : 'Error'; ?></span>
            </div>
            <div class="info-row">
                <span class="label">Ticket Time Limit:</span>
                <span class="value"><?php echo formatDate($bookingData['TktTimeLimit']); ?></span>
            </div>
        </div>

        <div class="section">
            <h2>Flight Information</h2>
            <?php 
            $isMultiCity = $bookingData['DirectionInd'] == 3;
            $isRoundTrip = $bookingData['DirectionInd'] == 2;
            
            foreach ($bookingData['TravelItinerary']['ItineraryInfo']['ReservationItems'] as $index => $flight): 
                if ($isMultiCity || $isRoundTrip):
                    $flightType = $isMultiCity ? 'Segment ' . ($index + 1) : ($flight['IsReturn'] ? 'Return Flight' : 'Outbound Flight');
            ?>
                <div style="margin: 20px 0; padding: 15px; background: #f8f8f8; border-radius: 4px;">
                    <h3 style="margin: 0 0 15px 0; color: #333; font-size: 1.1em;"><?php echo $flightType; ?></h3>
            <?php endif; ?>
                <div class="info-row">
                    <span class="label">Flight Number:</span>
                    <span class="value"><?php echo htmlspecialchars($flight['MarketingAirlineCode'] . ' ' . $flight['FlightNumber']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">From:</span>
                    <span class="value"><?php echo htmlspecialchars($flight['DepartureAirportLocationCode']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">To:</span>
                    <span class="value"><?php echo htmlspecialchars($flight['ArrivalAirportLocationCode']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Departure:</span>
                    <span class="value"><?php echo formatDate($flight['DepartureDateTime']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Arrival:</span>
                    <span class="value"><?php echo formatDate($flight['ArrivalDateTime']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Duration:</span>
                    <span class="value"><?php echo htmlspecialchars($flight['JourneyDuration']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Baggage Allowance:</span>
                    <span class="value"><?php echo htmlspecialchars($flight['Baggage']); ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Cabin Class:</span>
                    <span class="value"><?php echo cabinClassName($flight['CabinClassCode']); ?></span>
                </div>
            <?php if ($isMultiCity || $isRoundTrip): ?>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="section">
            <h2>Passenger Information</h2>
            <?php foreach ($bookingData['TravelItinerary']['ItineraryInfo']['CustomerInfoes'] as $customer): ?>
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value">
                    <?php 
                    $paxName = $customer['Customer']['PaxName'];
                    echo htmlspecialchars($paxName['PassengerTitle'] . ' ' . 
                        $paxName['PassengerFirstName'] . ' ' . 
                        $paxName['PassengerLastName']); 
                    ?>
                </span>
            </div>
            <div class="info-row">
                <span class="label">Passport Number:</span>
                <span class="value"><?php echo htmlspecialchars($customer['Customer']['PassportNumber']); ?></span>
            </div>
            <div class="info-row">
                <span class="label">E-Ticket Number:</span>
                <span class="value"><?php echo htmlspecialchars($customer['ETickets']); ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section">
            <h2>Fare Information</h2>
            <?php 
            $pricing = $bookingData['TravelItinerary']['ItineraryInfo']['ItineraryPricing'];
            ?>
            <div class="info-row">
                <span class="label">Base Fare:</span>
                <span class="value"><?php echo formatCurrency($pricing['BaseFare'], $pricing['Currency']); ?></span>
            </div>
            <div class="info-row">
                <span class="label">Taxes:</span>
                <span class="value"><?php echo formatCurrency($pricing['TotalTax'], $pricing['Currency']); ?></span>
            </div>
            <div class="info-row">
                <span class="label">Total Fare:</span>
                <span class="value"><?php echo formatCurrency($pricing['TotalFare'], $pricing['Currency']); ?></span>
            </div>
        </div>

        <div class="section">
            <h2>Additional Information</h2>
            <div class="info-row">
                <span class="label">Online Check-in:</span>
                <span class="value"><?php echo $bookingData['OnlineCheckIn'] ? 'Available' : 'Not Available'; ?></span>
            </div>
            <div class="info-row">
                <span class="label">Seat Selection:</span>
                <span class="value"><?php echo $bookingData['SeatSelection'] ? 'Available' : 'Not Available'; ?></span>
            </div>
            <?php if (!empty($bookingData['AirRemark'])): ?>
            <div class="info-row">
                <span class="label">Remarks:</span>
                <span class="value"><?php echo htmlspecialchars(implode(', ', $bookingData['AirRemark'])); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 
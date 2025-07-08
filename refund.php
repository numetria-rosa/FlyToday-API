<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .refund-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .ticket-info {
            background-color: #f8f9fa;
            border-left: 4px solid #dc3545;
            margin-bottom: 15px;
        }
        .status-badge {
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 15px;
        }
        .status-refunded {
            background-color: #198754;
            color: white;
        }
        .status-non-refundable {
            background-color: #dc3545;
            color: white;
        }
        .status-active {
            background-color: #0dcaf0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4">Refund Information</h1>
        
        <?php
        // === Air/AirRefundDisplay ===
        
        $refundData = [
            "Success" => true,
            "Error" => [
                "Id" => "",
                "Message" => ""
            ],
            "RefundType" => 1,
            "EticketNumbers" => [
                [
                    "ETicketNumber" => "1234567890123",
                    "EticketStatus" => 1,
                    "IsRefunded" => true,
                    "AirlinePnr" => "ABC123",
                    "PenaltyAmount" => 150,
                    "IsNonRefundable" => false
                ],
                [
                    "ETicketNumber" => "9876543210987",
                    "EticketStatus" => 1,
                    "IsRefunded" => false,
                    "AirlinePnr" => "XYZ789",
                    "PenaltyAmount" => 0,
                    "IsNonRefundable" => true
                ],
                [
                    "ETicketNumber" => "4567891234567",
                    "EticketStatus" => 1,
                    "IsRefunded" => false,
                    "AirlinePnr" => "DEF456",
                    "PenaltyAmount" => 75,
                    "IsNonRefundable" => false
                ]
            ]
        ];

        // Display Refund Information
        if (!empty($refundData['EticketNumbers'])) {
            foreach ($refundData['EticketNumbers'] as $ticket) {
                echo '<div class="card refund-card mb-4">';
                echo '<div class="card-body">';
                
                // Ticket Header with Status
                echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                echo '<h5 class="card-title mb-0">E-Ticket: ' . htmlspecialchars($ticket['ETicketNumber']) . '</h5>';
                
                // Status Badge
                $statusClass = '';
                $statusText = '';
                if ($ticket['IsRefunded']) {
                    $statusClass = 'status-refunded';
                    $statusText = 'Refunded';
                } elseif ($ticket['IsNonRefundable']) {
                    $statusClass = 'status-non-refundable';
                    $statusText = 'Non-Refundable';
                } else {
                    $statusClass = 'status-active';
                    $statusText = 'Active';
                }
                echo '<span class="status-badge ' . $statusClass . '">' . $statusText . '</span>';
                echo '</div>';
                
                // Ticket Details
                echo '<div class="ticket-info p-3">';
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo '<p class="mb-2"><strong>Airline PNR:</strong> ' . htmlspecialchars($ticket['AirlinePnr']) . '</p>';
                echo '</div>';
                echo '<div class="col-md-6">';
                if ($ticket['PenaltyAmount'] > 0) {
                    echo '<p class="mb-2"><strong>Penalty Amount:</strong> $' . htmlspecialchars($ticket['PenaltyAmount']) . '</p>';
                } else {
                    echo '<p class="mb-2"><strong>Penalty Amount:</strong> No penalty</p>';
                }
                echo '</div>';
                echo '</div>';
                
                // Additional Information
                echo '<div class="mt-3">';
                if ($ticket['IsRefunded']) {
                    echo '<p class="text-success mb-0"><i class="fas fa-check-circle"></i> This ticket has been successfully refunded.</p>';
                } elseif ($ticket['IsNonRefundable']) {
                    echo '<p class="text-danger mb-0"><i class="fas fa-times-circle"></i> This ticket is non-refundable.</p>';
                } else {
                    echo '<p class="text-info mb-0"><i class="fas fa-info-circle"></i> This ticket is eligible for refund.</p>';
                }
                echo '</div>';
                
                echo '</div>'; // End ticket-info
                echo '</div>'; // End card-body
                echo '</div>'; // End card
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare Rules Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fare-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .rule-details {
            background-color: #f8f9fa;
            border-left: 4px solid #198754;
            margin-bottom: 15px;
        }
        .rule-item {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4">Fare Rules Information</h1>
        
        <?php
        // === Air/AirRules ===
        $fareData = [
            "Success" => true,
            "Error" => [
                "Id" => "",
                "Message" => ""
            ],
            "FareType" => 1,
            "FareRules" => [
                [
                    "Airline" => "British Airways",
                    "CityPair" => "LHR-JFK",
                    "RuleDetails" => [
                        [
                            "Category" => "Cancellation",
                            "CategoryFa" => "لغو",
                            "Rules" => "Cancellation charges apply",
                            "RulesFa" => "هزینه لغو اعمال می شود",
                            "RuleItemsParsed" => [
                                [
                                    "From" => "0",
                                    "To" => "24",
                                    "Value" => "200",
                                    "Unit" => "USD",
                                    "IsParsRuleFa" => true
                                ],
                                [
                                    "From" => "25",
                                    "To" => "48",
                                    "Value" => "150",
                                    "Unit" => "USD",
                                    "IsParsRuleFa" => true
                                ]
                            ],
                            "MessageDirection" => "Before Departure"
                        ],
                        [
                            "Category" => "Change",
                            "CategoryFa" => "تغییر",
                            "Rules" => "Change fees apply",
                            "RulesFa" => "هزینه تغییر اعمال می شود",
                            "RuleItemsParsed" => [
                                [
                                    "From" => "0",
                                    "To" => "24",
                                    "Value" => "100",
                                    "Unit" => "USD",
                                    "IsParsRuleFa" => true
                                ]
                            ],
                            "MessageDirection" => "Before Departure"
                        ],
                        [
                            "Category" => "Refund",
                            "CategoryFa" => "استرداد",
                            "Rules" => "Refundable with penalty",
                            "RulesFa" => "قابل استرداد با جریمه",
                            "RuleItemsParsed" => [
                                [
                                    "From" => "0",
                                    "To" => "24",
                                    "Value" => "250",
                                    "Unit" => "USD",
                                    "IsParsRuleFa" => true
                                ]
                            ],
                            "MessageDirection" => "Before Departure"
                        ]
                    ]
                ],
                [
                    "Airline" => "Air France",
                    "CityPair" => "CDG-LAX",
                    "RuleDetails" => [
                        [
                            "Category" => "Cancellation",
                            "CategoryFa" => "لغو",
                            "Rules" => "Non-refundable fare",
                            "RulesFa" => "کرایه غیر قابل استرداد",
                            "RuleItemsParsed" => [
                                [
                                    "From" => "0",
                                    "To" => "24",
                                    "Value" => "100%",
                                    "Unit" => "Fare",
                                    "IsParsRuleFa" => true
                                ]
                            ],
                            "MessageDirection" => "Before Departure"
                        ]
                    ]
                ]
            ]
        ];

        // Fare Rules
        if (!empty($fareData['FareRules'])) {
            foreach ($fareData['FareRules'] as $fareRule) {
                echo '<div class="card fare-card mb-4">';
                echo '<div class="card-header bg-primary text-white">';
                echo '<h5 class="mb-0">' . htmlspecialchars($fareRule['Airline']) . ' - ' . htmlspecialchars($fareRule['CityPair']) . '</h5>';
                echo '</div>';
                echo '<div class="card-body">';
                
                if (!empty($fareRule['RuleDetails'])) {
                    foreach ($fareRule['RuleDetails'] as $ruleDetail) {
                        echo '<div class="rule-details p-3 mb-3">';
                        echo '<h6 class="mb-3">' . htmlspecialchars($ruleDetail['Category']) . '</h6>';
                        echo '<p class="mb-2"><strong>Rules:</strong> ' . htmlspecialchars($ruleDetail['Rules']) . '</p>';
                        echo '<p class="mb-3"><strong>Timing:</strong> ' . htmlspecialchars($ruleDetail['MessageDirection']) . '</p>';
                        
                        if (!empty($ruleDetail['RuleItemsParsed'])) {
                            echo '<div class="rule-items">';
                            foreach ($ruleDetail['RuleItemsParsed'] as $ruleItem) {
                                echo '<div class="rule-item">';
                                echo '<div class="row">';
                                echo '<div class="col-md-3"><strong>Time Window:</strong> ' . htmlspecialchars($ruleItem['From']) . '-' . htmlspecialchars($ruleItem['To']) . ' hours</div>';
                                echo '<div class="col-md-3"><strong>Value:</strong> ' . htmlspecialchars($ruleItem['Value']) . ' ' . htmlspecialchars($ruleItem['Unit']) . '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                }
                
                echo '</div></div>';
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
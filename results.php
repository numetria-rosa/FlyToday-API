<?php

// === Air/AirRevalidate ===
// === Step 1: Sample API Response ===
$response = [
    "Success" => true,
    "Error" => null,
    "PricedItineraries" => [
        // one-way flights
        [
            "IsPassportMandatory" => true,
            "IsDestinationAddressMandatory" => true,
            "CustomerAddressMaxLength" => 100,
            "IsPassportIssueDateMandatory" => true,
            "HasFareFamilies" => true,
            "DirectionInd" => 1,
            "NonRefundableType" => 0,
            "RefundMethod" => 0,
            "ValidatingAirlineCode" => "TK",
            "FareSourceCode" => "TK123456",
            "AirItineraryPricingInfo" => [
                "FareType" => 1,
                "ItinTotalFare" => [
                    "BaseFare" => 450.00,
                    "TotalFare" => 520.00,
                    "TotalCommission" => 20.00,
                    "TotalTax" => 50.00,
                    "ServiceTax" => 0,
                    "Currency" => "USD"
                ],
                "PtcFareBreakdown" => [
                    [
                        "PassengerFare" => [
                            "BaseFare" => 450.00,
                            "TotalFare" => 520.00,
                            "Commission" => 20.00,
                            "ServiceTax" => 0,
                            "Taxes" => [
                                [
                                    "Amount" => 50.00,
                                    "Currency" => "USD"
                                ]
                            ],
                            "Currency" => "USD",
                            "PriceCitizen" => 520.00,
                            "PriceRangeDifference" => 0,
                            "CommissionCashBack" => true
                        ],
                        "PassengerTypeQuantity" => [
                            "PassengerType" => 1,
                            "Quantity" => 1
                        ]
                    ]
                ]
            ],
            "OriginDestinationOptions" => [
                [
                    "JourneyDurationPerMinute" => 180,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-06-04T15:30:00+03:30",
                            "ArrivalDateTime" => "2025-06-04T18:30:00+03:30",
                            "StopQuantity" => 0,
                            "FlightNumber" => "TK1234",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "3h 00m",
                            "JourneyDurationPerMinute" => 180,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "LON",
                            "ArrivalAirportLocationCode" => "AMS",
                            "MarketingAirlineCode" => "TK",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "TK",
                                "FlightNumber" => "TK1234",
                                "Equipment" => "B738",
                                "EquipmentName" => "Boeing 737-800"
                            ],
                            "SeatsRemaining" => 9,
                            "IsCharter" => false,
                            "IsReturn" => false,
                            "Baggage" => "1PC",
                            "DepartureTerminal" => "2",
                            "ArrivalTerminal" => "3",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "IsPassportNameWithSpace" => true,
            "FareFamily" => [
                "FareFamilyComponents" => [
                    [
                        "RateCategory" => "ECONOMY",
                        "Name" => "Economy Light",
                        "CarrierAirlineCode" => "TK",
                        "Origin" => "LON",
                        "Destination" => "AMS",
                        "Descriptions" => [
                            [
                                "Indicator" => 1,
                                "AirlineCode" => "TK",
                                "ServiceType" => 1,
                                "Details" => "Basic Economy Fare"
                            ]
                        ]
                    ]
                ]
            ],
            "HasAmenities" => true,
            "IsSeatServiceMandatory" => false,
            "IsMealServiceMandatory" => false,
            "VisaRequirements" => [],
            "IsClosed" => false,
            "IsAutoReserved" => false,
            "PayLater" => [
                "HasPayLater" => true,
                "FixedInitialPayment" => 100,
                "InitialPaymentPercentage" => 20
            ],
            "Labels" => ["Best Price"],
            "LabelsFa" => ["بهترین قیمت"],
            "HasCancellationGuarantee" => true
        ],
        // New Round Trip Flight
        [
            "IsPassportMandatory" => true,
            "IsDestinationAddressMandatory" => true,
            "CustomerAddressMaxLength" => 100,
            "IsPassportIssueDateMandatory" => true,
            "HasFareFamilies" => true,
            "DirectionInd" => 2,
            "NonRefundableType" => 0,
            "RefundMethod" => 0,
            "ValidatingAirlineCode" => "LH",
            "FareSourceCode" => "LH789012",
            "AirItineraryPricingInfo" => [
                "FareType" => 1,
                "ItinTotalFare" => [
                    "BaseFare" => 800.00,
                    "TotalFare" => 920.00,
                    "TotalCommission" => 35.00,
                    "TotalTax" => 85.00,
                    "ServiceTax" => 0,
                    "Currency" => "USD"
                ],
                "PtcFareBreakdown" => [
                    [
                        "PassengerFare" => [
                            "BaseFare" => 800.00,
                            "TotalFare" => 920.00,
                            "Commission" => 35.00,
                            "ServiceTax" => 0,
                            "Taxes" => [
                                [
                                    "Amount" => 85.00,
                                    "Currency" => "USD"
                                ]
                            ],
                            "Currency" => "USD",
                            "PriceCitizen" => 920.00,
                            "PriceRangeDifference" => 0,
                            "CommissionCashBack" => true
                        ],
                        "PassengerTypeQuantity" => [
                            "PassengerType" => 1,
                            "Quantity" => 1
                        ]
                    ]
                ]
            ],
            "OriginDestinationOptions" => [
                // Outbound Flight
                [
                    "JourneyDurationPerMinute" => 195,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-06-10T08:15:00+01:00",
                            "ArrivalDateTime" => "2025-06-10T11:30:00+02:00",
                            "StopQuantity" => 0,
                            "FlightNumber" => "LH400",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "3h 15m",
                            "JourneyDurationPerMinute" => 195,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "LHR",
                            "ArrivalAirportLocationCode" => "FRA",
                            "MarketingAirlineCode" => "LH",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "LH",
                                "FlightNumber" => "LH400",
                                "Equipment" => "A320",
                                "EquipmentName" => "Airbus A320"
                            ],
                            "SeatsRemaining" => 7,
                            "IsCharter" => false,
                            "IsReturn" => false,
                            "Baggage" => "2PC",
                            "DepartureTerminal" => "2",
                            "ArrivalTerminal" => "1",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ],
                // Return Flight
                [
                    "JourneyDurationPerMinute" => 195,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-06-17T13:45:00+02:00",
                            "ArrivalDateTime" => "2025-06-17T15:00:00+01:00",
                            "StopQuantity" => 0,
                            "FlightNumber" => "LH401",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "3h 15m",
                            "JourneyDurationPerMinute" => 195,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "FRA",
                            "ArrivalAirportLocationCode" => "LHR",
                            "MarketingAirlineCode" => "LH",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "LH",
                                "FlightNumber" => "LH401",
                                "Equipment" => "A320",
                                "EquipmentName" => "Airbus A320"
                            ],
                            "SeatsRemaining" => 5,
                            "IsCharter" => false,
                            "IsReturn" => true,
                            "Baggage" => "2PC",
                            "DepartureTerminal" => "1",
                            "ArrivalTerminal" => "2",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "IsPassportNameWithSpace" => true,
            "FareFamily" => [
                "FareFamilyComponents" => [
                    [
                        "RateCategory" => "ECONOMY",
                        "Name" => "Economy Classic",
                        "CarrierAirlineCode" => "LH",
                        "Origin" => "LHR",
                        "Destination" => "FRA",
                        "Descriptions" => [
                            [
                                "Indicator" => 1,
                                "AirlineCode" => "LH",
                                "ServiceType" => 1,
                                "Details" => "Standard Economy Fare"
                            ]
                        ]
                    ]
                ]
            ],
            "HasAmenities" => true,
            "IsSeatServiceMandatory" => false,
            "IsMealServiceMandatory" => true,
            "VisaRequirements" => [],
            "IsClosed" => false,
            "IsAutoReserved" => false,
            "PayLater" => [
                "HasPayLater" => true,
                "FixedInitialPayment" => 180,
                "InitialPaymentPercentage" => 20
            ],
            "Labels" => ["Round Trip", "Popular Choice"],
            "LabelsFa" => ["رفت و برگشت", "محبوب"],
            "HasCancellationGuarantee" => true
        ],
        // multi-city flight sample after the round-trip flight
        [
            "IsPassportMandatory" => true,
            "IsDestinationAddressMandatory" => true,
            "CustomerAddressMaxLength" => 100,
            "IsPassportIssueDateMandatory" => true,
            "HasFareFamilies" => true,
            "DirectionInd" => 3,
            "NonRefundableType" => 0,
            "RefundMethod" => 0,
            "ValidatingAirlineCode" => "AF",
            "FareSourceCode" => "AF456789",
            "AirItineraryPricingInfo" => [
                "FareType" => 1,
                "ItinTotalFare" => [
                    "BaseFare" => 1200.00,
                    "TotalFare" => 1380.00,
                    "TotalCommission" => 45.00,
                    "TotalTax" => 135.00,
                    "ServiceTax" => 0,
                    "Currency" => "USD"
                ],
                "PtcFareBreakdown" => [
                    [
                        "PassengerFare" => [
                            "BaseFare" => 1200.00,
                            "TotalFare" => 1380.00,
                            "Commission" => 45.00,
                            "ServiceTax" => 0,
                            "Taxes" => [
                                [
                                    "Amount" => 135.00,
                                    "Currency" => "USD"
                                ]
                            ],
                            "Currency" => "USD",
                            "PriceCitizen" => 1380.00,
                            "PriceRangeDifference" => 0,
                            "CommissionCashBack" => true
                        ],
                        "PassengerTypeQuantity" => [
                            "PassengerType" => 1,
                            "Quantity" => 1
                        ]
                    ]
                ]
            ],
            "OriginDestinationOptions" => [
                // First Segment: LHR to CDG
                [
                    "JourneyDurationPerMinute" => 90,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-07-01T08:30:00+01:00",
                            "ArrivalDateTime" => "2025-07-01T10:00:00+02:00",
                            "StopQuantity" => 0,
                            "FlightNumber" => "AF1381",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "1h 30m",
                            "JourneyDurationPerMinute" => 90,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "LHR",
                            "ArrivalAirportLocationCode" => "CDG",
                            "MarketingAirlineCode" => "AF",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "AF",
                                "FlightNumber" => "AF1381",
                                "Equipment" => "A320",
                                "EquipmentName" => "Airbus A320"
                            ],
                            "SeatsRemaining" => 8,
                            "IsCharter" => false,
                            "IsReturn" => false,
                            "Baggage" => "2PC",
                            "DepartureTerminal" => "4",
                            "ArrivalTerminal" => "2E",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ],
                // Second Segment: CDG to FCO
                [
                    "JourneyDurationPerMinute" => 150,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-07-05T10:45:00+02:00",
                            "ArrivalDateTime" => "2025-07-05T13:15:00+02:00",
                            "StopQuantity" => 0,
                            "FlightNumber" => "AF1004",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "2h 30m",
                            "JourneyDurationPerMinute" => 150,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "CDG",
                            "ArrivalAirportLocationCode" => "FCO",
                            "MarketingAirlineCode" => "AF",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "AF",
                                "FlightNumber" => "AF1004",
                                "Equipment" => "A320",
                                "EquipmentName" => "Airbus A320"
                            ],
                            "SeatsRemaining" => 6,
                            "IsCharter" => false,
                            "IsReturn" => false,
                            "Baggage" => "2PC",
                            "DepartureTerminal" => "2E",
                            "ArrivalTerminal" => "3",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ],
                // Third Segment: FCO to LHR
                [
                    "JourneyDurationPerMinute" => 180,
                    "ConnectionTimePerMinute" => 0,
                    "FlightSegments" => [
                        [
                            "DepartureDateTime" => "2025-07-10T14:20:00+02:00",
                            "ArrivalDateTime" => "2025-07-10T16:20:00+01:00",
                            "StopQuantity" => 0,
                            "FlightNumber" => "BA552",
                            "ResBookDesigCode" => "Y",
                            "JourneyDuration" => "3h 00m",
                            "JourneyDurationPerMinute" => 180,
                            "ConnectionTimePerMinute" => 0,
                            "DepartureAirportLocationCode" => "FCO",
                            "ArrivalAirportLocationCode" => "LHR",
                            "MarketingAirlineCode" => "BA",
                            "CabinClassCode" => 1,
                            "OperatingAirline" => [
                                "Code" => "BA",
                                "FlightNumber" => "BA552",
                                "Equipment" => "A320",
                                "EquipmentName" => "Airbus A320"
                            ],
                            "SeatsRemaining" => 4,
                            "IsCharter" => false,
                            "IsReturn" => true,
                            "Baggage" => "2PC",
                            "DepartureTerminal" => "3",
                            "ArrivalTerminal" => "5",
                            "TechnicalStops" => [],
                            "FlightAmenities" => [
                                [
                                    "Description" => "Meal Service",
                                    "Value" => 1,
                                    "ClassName" => "Economy"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "IsPassportNameWithSpace" => true,
            "FareFamily" => [
                "FareFamilyComponents" => [
                    [
                        "RateCategory" => "ECONOMY",
                        "Name" => "Economy Classic",
                        "CarrierAirlineCode" => "AF",
                        "Origin" => "LHR",
                        "Destination" => "FCO",
                        "Descriptions" => [
                            [
                                "Indicator" => 1,
                                "AirlineCode" => "AF",
                                "ServiceType" => 1,
                                "Details" => "Multi-City Economy Fare"
                            ]
                        ]
                    ]
                ]
            ],
            "HasAmenities" => true,
            "IsSeatServiceMandatory" => false,
            "IsMealServiceMandatory" => true,
            "VisaRequirements" => [],
            "IsClosed" => false,
            "IsAutoReserved" => false,
            "PayLater" => [
                "HasPayLater" => true,
                "FixedInitialPayment" => 250,
                "InitialPaymentPercentage" => 20
            ],
            "Labels" => ["Multi-City", "Best Value"],
            "LabelsFa" => ["چند شهری", "بهترین ارزش"],
            "HasCancellationGuarantee" => true
        ]
    ]
];

// === Step 2: Helper functions ===
function formatDate($dateStr) {
    $dt = new DateTime($dateStr);
    return $dt->format("D, M j Y - H:i");
}

function cabinClassName($code) {
    $map = [
        1 => 'Economy',
        2 => 'Premium Economy',
        3 => 'Business',
        4 => 'First'
    ];
    return $map[$code] ?? 'Unknown';
}

function refundStatus($type) {
    return $type === 0 ? 'Refundable' : 'Non-Refundable';
}

function formatDuration($minutes) {
    $hours = floor($minutes / 60);
    $mins = $minutes % 60;
    return sprintf("%dh %02dm", $hours, $mins);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flight Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 20px;
            color: #2d3748;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            color: #2d3748;
            margin-bottom: 30px;
            font-size: 2.5em;
        }
        .flight-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 25px;
            transition: transform 0.2s;
        }
        .flight-card:hover {
            transform: translateY(-2px);
        }
        .flight-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e2e8f0;
        }
        .airline-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .airline-logo {
            width: 40px;
            height: 40px;
            background: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .price-info {
            text-align: right;
        }
        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #2d3748;
        }
        .flight-details {
            display: grid;
            grid-template-columns: 2fr 1fr 2fr;
            gap: 20px;
            align-items: center;
            margin: 20px 0;
        }
        .flight-time {
            text-align: center;
        }
        .time {
            font-size: 1.2em;
            font-weight: bold;
        }
        .airport {
            color: #4a5568;
            margin-top: 5px;
        }
        .flight-duration {
            text-align: center;
            color: #4a5568;
            position: relative;
        }
        .flight-duration::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
            z-index: 1;
        }
        .duration-text {
            position: relative;
            background: white;
            padding: 0 10px;
            z-index: 2;
        }
        .flight-info {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }
        .info-row {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }
        .info-label {
            color: #4a5568;
            min-width: 100px;
        }
        .btn-book {
            display: inline-block;
            background: #4299e1;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s;
        }
        .btn-book:hover {
            background: #3182ce;
        }
        .labels {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .label {
            background: #ebf8ff;
            color: #2b6cb0;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .flight-direction {
            font-size: 0.9em;
            color: #718096;
            margin-bottom: 10px;
            padding: 8px 15px;
            background: #f7fafc;
            border-radius: 6px;
            display: inline-block;
        }
        .flight-separator {
            border-top: 2px dashed #e2e8f0;
            margin: 20px 0;
        }
        .flight-segment {
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
        }
        .flight-segment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        .flight-segment-title {
            font-size: 1.1em;
            font-weight: 600;
            color: #2d3748;
        }
        .flight-segment-date {
            color: #718096;
            font-size: 0.9em;
        }
        .flight-segment-details {
            display: grid;
            grid-template-columns: 2fr 1fr 2fr;
            gap: 20px;
            align-items: center;
            background: white;
            padding: 15px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .flight-segment-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .info-item-label {
            color: #718096;
            font-size: 0.9em;
        }
        .info-item-value {
            color: #2d3748;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Flights</h1>

        <?php 
        if (!$response || !is_array($response)) {
            echo "<p><strong>Error:</strong> Invalid or empty response from API.</p>";
        } elseif (isset($response['Success']) && $response['Success'] && isset($response['PricedItineraries'])) {
            foreach ($response['PricedItineraries'] as $itinerary):
                $airline = $itinerary['ValidatingAirlineCode'] ?? 'N/A';
                $fareCode = $itinerary['FareSourceCode'] ?? '';
                $pricingInfo = $itinerary['AirItineraryPricingInfo']['ItinTotalFare'] ?? [];
                $currency = $pricingInfo['Currency'] ?? 'USD';
                $totalFare = $pricingInfo['TotalFare'] ?? 0;
                $baseFare = $pricingInfo['BaseFare'] ?? 0;
                $refundable = refundStatus($itinerary['NonRefundableType'] ?? 0);
                
                if (isset($itinerary['OriginDestinationOptions'])):
                    $isRoundTrip = count($itinerary['OriginDestinationOptions']) > 1;
        ?>
                <div class="flight-card">
                    <div class="flight-header">
                        <div class="airline-info">
                            <div class="airline-logo"><?= substr($airline, 0, 2) ?></div>
                            <div>
                                <h3><?= $airline ?> <?= $isRoundTrip ? 'Round Trip' : 'One Way' ?></h3>
                                <div><?= cabinClassName($itinerary['OriginDestinationOptions'][0]['FlightSegments'][0]['CabinClassCode'] ?? 0) ?></div>
                            </div>
                        </div>
                        <div class="price-info">
                            <div class="price"><?= $totalFare . ' ' . $currency ?></div>
                            <div><?= $refundable ?></div>
                        </div>
                    </div>

                    <?php foreach ($itinerary['OriginDestinationOptions'] as $index => $option): 
                        $isReturn = $index > 0;
                        if (isset($option['FlightSegments'])):
                            foreach ($option['FlightSegments'] as $segment): 
                                $flight = ($segment['MarketingAirlineCode'] ?? '') . ' ' . ($segment['FlightNumber'] ?? '');
                                $from = $segment['DepartureAirportLocationCode'] ?? 'N/A';
                                $to = $segment['ArrivalAirportLocationCode'] ?? 'N/A';
                                $depart = isset($segment['DepartureDateTime']) ? formatDate($segment['DepartureDateTime']) : 'N/A';
                                $arrive = isset($segment['ArrivalDateTime']) ? formatDate($segment['ArrivalDateTime']) : 'N/A';
                                $cabin = cabinClassName($segment['CabinClassCode'] ?? 0);
                                $baggage = $segment['Baggage'] ?? 'N/A';
                                $duration = formatDuration($option['JourneyDurationPerMinute'] ?? 0);
                                $equipment = $segment['OperatingAirline']['EquipmentName'] ?? 'N/A';
                    ?>
                                <div class="flight-segment">
                                    <div class="flight-segment-header">
                                        <div class="flight-segment-title">
                                            <?php
                                            if ($itinerary['DirectionInd'] == 3) {
                                                echo 'Segment ' . ($index + 1) . ': ' . $from . ' → ' . $to;
                                            } else {
                                                echo $isReturn ? 'Return Flight' : 'Outbound Flight';
                                            }
                                            ?>
                                        </div>
                                        <div class="flight-segment-date">
                                            <?= date('D, M j Y', strtotime($segment['DepartureDateTime'])) ?>
                                        </div>
                                    </div>

                                    <div class="flight-segment-details">
                                        <div class="flight-time">
                                            <div class="time"><?= date('H:i', strtotime($segment['DepartureDateTime'])) ?></div>
                                            <div class="airport"><?= $from ?></div>
                                        </div>
                                        <div class="flight-duration">
                                            <div class="duration-text"><?= $duration ?></div>
                                        </div>
                                        <div class="flight-time">
                                            <div class="time"><?= date('H:i', strtotime($segment['ArrivalDateTime'])) ?></div>
                                            <div class="airport"><?= $to ?></div>
                                        </div>
                                    </div>

                                    <div class="flight-segment-info">
                                        <div class="info-item">
                                            <span class="info-item-label">Flight</span>
                                            <span class="info-item-value"><?= $flight ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-item-label">Aircraft</span>
                                            <span class="info-item-value"><?= $equipment ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-item-label">Baggage</span>
                                            <span class="info-item-value"><?= $baggage ?></span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-item-label">Cabin</span>
                                            <span class="info-item-value"><?= $cabin ?></span>
                                        </div>
                                    </div>
                                </div>
                    <?php 
                            endforeach;
                        endif;
                    endforeach;
                    ?>

                    <?php if (!empty($itinerary['Labels'])): ?>
                    <div class="labels">
                        <?php foreach ($itinerary['Labels'] as $label): ?>
                            <span class="label"><?= htmlspecialchars($label) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <div class="flight-info">
                        <div class="info-row">
                            <span class="info-label">Total Fare:</span>
                            <span><?= $totalFare . ' ' . $currency ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Base Fare:</span>
                            <span><?= $baseFare . ' ' . $currency ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Taxes:</span>
                            <span><?= ($totalFare - $baseFare) . ' ' . $currency ?></span>
                        </div>
                    </div>

                    <form action="booking.php" method="POST" style="display: inline;">
                        <input type="hidden" name="fareCode" value="<?= htmlspecialchars($fareCode) ?>">
                        <input type="hidden" name="airline" value="<?= htmlspecialchars($airline) ?>">
                        <input type="hidden" name="totalFare" value="<?= htmlspecialchars($totalFare) ?>">
                        <input type="hidden" name="baseFare" value="<?= htmlspecialchars($baseFare) ?>">
                        <input type="hidden" name="currency" value="<?= htmlspecialchars($currency) ?>">
                        <input type="hidden" name="directionInd" value="<?= htmlspecialchars($itinerary['DirectionInd']) ?>">
                        <input type="hidden" name="flightData" value="<?= htmlspecialchars(json_encode($itinerary)) ?>">
                        <button type="submit" class="btn-book">Book Now</button>
                    </form>
                </div>
        <?php 
                endif;
            endforeach;
        } else {
            echo "<p>No flights found or an error occurred.</p>";
        }
        ?>
    </div>
</body>
</html>

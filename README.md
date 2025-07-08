# ✈️ FLY_TODAY - Flight Booking System

A modern PHP-based flight booking system that integrates with the PartoCRS API to provide comprehensive flight search, booking, and management capabilities.

## 🚀 Features

- **🔍 Flight Search**: Low fare search with multiple criteria
- **📅 Booking Management**: Complete booking workflow
- **💳 Fare Validation**: Real-time fare revalidation
- **🎒 Baggage Information**: Detailed baggage rules and policies
- **🔄 Refund Processing**: Online refund display and processing
- **📋 Booking Details**: Comprehensive booking information
- **🎫 Ticket Management**: E-ticket ordering and management
- **📝 Booking Notes**: Add and manage booking notes
- **🔐 Authentication**: Secure session management

## 🛠️ Technology Stack

- **Backend**: PHP 7.4+
- **API Integration**: PartoCRS API
- **Frontend**: HTML5, CSS3, JavaScript
- **Database**: MySQL 
- **Styling**: Custom CSS with modern design

## 📁 Project Structure

```
FLY_TODAY/
├── 📄 api.php              # Core API functions for PartoCRS integration
├── 🔐 auth.php             # Authentication and session management
├── 🎒 baggage.php          # Baggage information and rules
├── 📋 booking.php          # Booking management and details
├── ⚙️ config.php           # Configuration settings
├── 🗄️ db.php              # Database connection
├── 💰 fare.php             # Fare validation and pricing
├── 🔄 refund.php           # Refund processing
├── 📊 results.php          # Flight search results display
└── 📁 assets/
    ├── 🎨 css/
    │   └── styles.css      # Main stylesheet
    └── ⚡ js/
        └── scripts.js      # JavaScript functionality
```

## 🚀 Getting Started

### Prerequisites

- PHP 7.4 or higher
- MySQL database
- Web server (Apache/Nginx)
- cURL extension enabled
- PartoCRS API credentials

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/numetria-rosa/FlyToday-API.git
   ```

2. **Configure the application**
   - Edit `config.php` with your PartoCRS API credentials:
   ```php
   const PARTO_OFFICE_ID = 'YOUR_OFFICE_ID';
   const PARTO_USERNAME  = 'YOUR_USERNAME';
   const PARTO_PASSWORD  = 'YOUR_PASSWORD';
   ```

3. **Set up the database**
   - Configure your database connection in `db.php`
   - Import any required database schemas

4. **Configure your web server**
   - Point your web server to the project directory
   - Ensure PHP has write permissions for session management

### Configuration

The system uses the following configuration in `config.php`:

- **API Base URL**: PartoCRS demo/production endpoint
- **Credentials**: Office ID, username, and password
- **Session Lifetime**: 15 minutes (900 seconds) by default

## 🔧 API Functions

### Core Flight Operations

- `airLowFareSearch()` - Search for low fare flights
- `airRevalidate()` - Validate fare prices
- `airRules()` - Retrieve fare rules
- `airBook()` - Book flights
- `airBaggages()` - Get baggage information
- `airCancel()` - Cancel bookings
- `airRefundDisplay()` - Display refund information
- `airRefund()` - Process refunds
- `airBookingData()` - Retrieve booking details
- `airAddBookingNotes()` - Add booking notes
- `airOrderTicket()` - Order e-tickets
- `airRefundOfflineRequest()` - Request offline refunds

## 🎨 User Interface

The system features a modern, responsive design with:

- **Clean Layout**: Professional flight booking interface
- **Flight Cards**: Attractive flight result displays
- **Interactive Elements**: Hover effects and smooth transitions
- **Mobile Responsive**: Works on all device sizes
- **Color Scheme**: Professional blue and white theme

## 🔐 Security Features

- **Session Management**: Secure session handling with PartoCRS
- **Input Validation**: Proper validation of all user inputs
- **Error Handling**: Comprehensive error handling and logging
- **API Security**: Secure API communication with proper headers

## 📊 Database Schema

The system uses a MySQL database for storing:
- User sessions
- Booking information
- Flight data
- Transaction records

## 🚀 Usage Examples

### Flight Search
```php
$criteria = [
    'Origin' => 'JFK',
    'Destination' => 'LAX',
    'DepartureDate' => '2024-01-15',
    'ADT' => 1,
    'CabinClass' => 1
];

$results = airLowFareSearch($criteria);
```

### Booking a Flight
```php
$bookingData = [
    'FareSourceCode' => 'ABC123',
    'PassengerInfo' => [...],
    'ContactInfo' => [...]
];

$booking = airBook($bookingData);
```

## 🐛 Troubleshooting

### Common Issues

1. **API Connection Errors**
   - Verify PartoCRS credentials in `config.php`
   - Check network connectivity
   - Ensure cURL extension is enabled

2. **Session Errors**
   - Verify session lifetime configuration
   - Check server session storage permissions

3. **Database Connection Issues**
   - Verify database credentials in `db.php`
   - Ensure MySQL service is running

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request





## 🔄 Version History

- **v1.0.0** - Initial release with core flight booking functionality
- **v1.1.0** - Added refund processing capabilities
- **v1.2.0** - Enhanced UI/UX and mobile responsiveness

---

**Made with ❤️ for seamless flight booking experiences!** 

// Common JavaScript functions

// Format date function
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString();
}

// Format currency function
function formatCurrency(amount, currency) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: currency
    }).format(amount);
}

// Add any additional JavaScript functionality here 
// Example AJAX request using fetch API
async function submitBondPriceRequest(countryCode, years) {
    const response = await fetch('/api/bond-price', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({ country_code: countryCode, years: years })
    });
    const data = await response.json();
    console.log(data);
    return data;
}

// Usage Example:
// submitBondPriceRequest('BE', 1).then(console.log);

# Laravel Xendit Payment Gateway Integration

This project demonstrates the integration of Xendit payment gateway with Laravel 11. It includes a simple product catalog and checkout system with various payment methods supported by Xendit.

## Features

- Product catalog with price and stock management
- Simple checkout process
- Multiple payment methods through Xendit
- Payment status webhook handling
- Stock management after successful payment
- Responsive design with Tailwind CSS

## Requirements

- PHP >= 8.2
- Laravel 11.x
- Composer
- MySQL/PostgreSQL
- Xendit account and API keys

## Installation

1. Clone the repository

```bash
git clone https://github.com/yourusername/laravel-xendit.git
cd laravel-xendit
```

2. Install dependencies

```bash
composer install
```

3. Create and configure .env file

```bash
cp .env.example .env
```

4. Configure your database and Xendit credentials in .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

XENDIT_SECRET_KEY=your_xendit_key_here
XENDIT_CALLBACK_TOKEN=your_callback_token_here
```

5. Generate application key

```bash
php artisan key:generate
```

6. Run migrations and seeders

```bash
php artisan migrate --seed
```

## Database Structure

### Products Table

- id
- name
- description
- price
- stock
- image
- timestamps

### Orders Table

- id
- product_id
- invoice_id
- amount
- status
- payment_method
- payment_channel
- payment_status
- customer_name
- customer_email
- timestamps

## Available Routes

- GET `/` - Product listing page
- GET `/products/{product}` - Product detail page
- POST `/products/{product}/order` - Create new order
- POST `/payment/callback` - Xendit webhook endpoint
- GET `/payment/success` - Payment success page
- GET `/payment/failed` - Payment failed page

## Payment Flow

1. User selects a product
2. User fills in customer details (name and email)
3. System creates Xendit invoice
4. User is redirected to Xendit payment page
5. User completes payment
6. Xendit sends webhook notification
7. System updates order status and product stock
8. User is redirected to success/failed page

## Supported Payment Methods

- Bank Transfer (BCA, BNI, BSI, BRI, Mandiri, Permata)
- Retail Outlets (Alfamart, Indomaret)
- E-Wallets (OVO, DANA, LinkAja)
- QRIS

## Webhook Setup

1. Log in to your Xendit Dashboard
2. Go to Settings > Webhooks
3. Add new webhook URL:
   ```
   https://your-domain.com/payment/callback
   ```
4. Make sure to set the callback token in your .env file

## Development

To run the development server:

```bash
php artisan serve
```

## Testing

Run the test suite:

```bash
php artisan test
```

## Security

- Webhook verification using callback tokens
- Input validation
- SQL injection prevention through Laravel's query builder
- XSS protection through Laravel's built-in security features

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For support, contact the development team or raise an issue in the GitHub repository.

## Author

- GitHub: [@iritmaulana](https://github.com/iritmaulana)
- Email: iritmaulana@gmail.com

## Acknowledgements

- [Laravel](https://laravel.com)
- [Xendit](https://xendit.co)
- [Tailwind CSS](https://tailwindcss.com)

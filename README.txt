Thrive Business Platform
Thrive is a business funding and promotion platform that allows users to start businesses, promote them, and raise funding through a crowdfunding model. This project is built using Laravel, and provides features for users to manage their businesses, view funding progress, and engage with potential donors.
====================================================================================================================================================================================
Features
User authentication: Login, register, and password management.
Business creation and management: Users can create and manage their own businesses.
Business listing: Users can view their businesses and related information (such as description and images).
Image upload for business promotion.
Funding progress tracking: Display goal and raised amounts.
Fundraising system: Users can donate to other businesses.
Responsive design using Tailwind CSS.
Persistent storage using Laravel and MySQL.


====================================================================================================================================================================================
Installation
Run these commands on the powershell of visual studio code
composer install
npm install
npm run dev

Link the storage directory:
php artisan storage:link
php artisan migrate --seed

====================================================================================================================================================================================
Setup

To run the project:
php artisan serve

Open the application in your browser at:
http://localhost:8000



====================================================================================================================================================================================
Usage
User Authentication
Users can register and login to the platform. They must be authenticated to create or manage their business.

Business Functionality

Starting a Business
Users can create a new business by visiting the Start Your Business page, filling out details such as:
Business Name
Business Description
Category
Goal Amount
Product Photos (optional)


Viewing and Managing Businesses
Authenticated users can view a list of their businesses under the Your Business page. Each business includes:
Business Name
Business Description
Images (if uploaded)
Funding Progress (Goal and Raised amounts)
Users can also view the details of each business and check the progress of their fundraising efforts.

Fundraising Functionality
Funding a Business
Users can contribute to other businesses by visiting their details page and making a donation.


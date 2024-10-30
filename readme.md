# Vending Machine Application

## Overview
This project is a Vending Machine application developed using PHP and Laragon. It allows users to select from a list of products, specify the quantity, and view a purchase summary including the total number of items and the total amount due.

## Features

- **Product Selection**: Users can choose from 5 different items.
- **Quantity Option**: Users can specify the quantity for each selected item.
- **Purchase Summary**: After selection, users can view a summary of their purchase.
- **Total Calculation**: The application calculates the total number of items and the total amount due.
- **Static Login System**: The application includes a static login system with three user types:
  - **Admin**: Has full access to all features and settings.
  - **Content Manager**: Can manage product listings and oversee inventory.
  - **System User**: Can make purchases and view their purchase history.

## Static Login Implementation

### User Types
1. **Admin**
   - Full access to the application.
   - Can manage users, products, and view reports.

2. **Content Manager**
   - Can add, edit, or remove products.
   - Responsible for maintaining the inventory.

3. **System User**
   - Can browse products and make purchases.
   - Can view their purchase history.

### Login Functionality
The static login functionality allows users to authenticate based on predefined credentials for each user type. Upon successful login, users are redirected to their respective dashboards with access to features relevant to their roles.

## Acknowledgments
This project was completed with the assistance of AI tools, which helped streamline the development process and enhance the overall functionality of the application.
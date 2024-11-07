# Advance Web Development with PHP language, Supported by AI 

## Vending Machine Application

### Overview
This project is a Vending Machine application developed using PHP and Laragon. It allows users to select from a list of products, specify the quantity, and view a purchase summary including the total number of items and the total amount due.

### Features

- **Product Selection**: Users can choose from 5 different items.
- **Quantity Option**: Users can specify the quantity for each selected item.
- **Purchase Summary**: After selection, users can view a summary of their purchase.
- **Total Calculation**: The application calculates the total number of items and the total amount due.
- **Static Login System**: The application includes a static login system with three user types:
  - **Admin**: Has full access to all features and settings.
  - **Content Manager**: Can manage product listings and oversee inventory.
  - **System User**: Can make purchases and view their purchase history.

## Static Login System Overview

### Overview
The static login system is designed to provide secure access to the Vending Machine application, allowing different user types to interact with the application based on their roles. This system utilizes predefined credentials for authentication and ensures that users can only access features relevant to their permissions.

#### User Types
1. **Admin**
   - **Access Level**: Full access to all application features and settings.
   - **Capabilities**: Manage users, products, and view comprehensive reports.

2. **Content Manager**
   - **Access Level**: Intermediate access focused on product management.
   - **Capabilities**: Add, edit, or remove products and maintain inventory.

3. **System User**
   - **Access Level**: Limited access for purchasing and viewing history.
   - **Capabilities**: Browse products, make purchases, and view their purchase history.

#### Login Functionality
- **Authentication**: Users authenticate using predefined credentials specific to their user type.
- **Redirection**: Upon successful login, users are redirected to their respective dashboards, where they can access features based on their roles.
- **Security**: The static nature of the login system ensures controlled access, minimizing the risk of unauthorized use.

This static login implementation enhances the overall security and usability of the Vending Machine application, ensuring that each user can efficiently perform their designated tasks.


## Peys App

### Overview
Peys App is a versatile application that allows users to select and customize photos before uploading them. Users can adjust the size of their images using an adjustable slider, select a border color.
#### Features

- **Adjustable Photo Size**: Users can resize their images using an intuitive slider interface.
- **Border Color Selection**: Users can choose their desired border color for the image.
- **Process Button**: A dedicated button to process the selected image with the chosen settings.

### Usage
To use the Peys App, simply select an image from your device, adjust the size and border color using the provided tools, and click the process button to finalize your image before uploading.

# Preliminary Exam: Student Enrollment and Grade Processing System

## Overview
This project is a web-based application designed to facilitate student enrollment and grade processing through a two-form system. The first form collects student enrollment details, while the second form captures grades for various assessments. The application computes the average grade and determines if the student has passed or failed based on their performance.

## Features

### Form 1: Student Enrollment Form
- **Text Fields**: 
  - First Name (Textbox)
  - Last Name (Textbox)
  - Age (Textbox)
  - Course (Textbox)
  - Email (Textbox)
- **Radio Buttons**: 
  - Gender (Male/Female)
  - Enrollment Status (Full-time/Part-time)
- **Button**: 
  - Next (Navigates to the Grade Entry Form)

### Form 2: Grade Entry Form
- **Text Fields**:
  - Prelim Grade (Textbox)
  - Midterm Grade (Textbox)
  - Final Grade (Textbox)
- **Button**: 
  - Register (Submits the grades and calculates the average)

## Functionality
1. **User  Input**: 
   - Users fill out the Student Enrollment Form with their details and select their gender and enrollment status.
   - Upon clicking the "Next" button, the user is redirected to the Grade Entry Form.
   
2. **Grade Calculation**:
   - Users enter their grades for Prelim, Midterm, and Final assessments.
   - On clicking the "Register" button, the application computes the average of the grades.

3. **Results Display**:
   - After grade computation, the application displays:
     - All data entered in the Student Enrollment Form.
     - The computed average grade.
     - A pass/fail status based on the average (Passed if 75 or above, Failed if below 75).

## User Interface
The application features a user-friendly interface that guides users through the enrollment and grading process seamlessly. Each form is designed to be intuitive, ensuring a smooth user experience.

## Usage
1. Open the application in a web browser.
2. Fill in the Student Enrollment Form with the required details.
3. Click the "Next" button to proceed to the Grade Entry Form.
4. Enter the grades for Prelim, Midterm, and Final assessments.
5. Click the "Register" button to submit the grades and view the results.

## Acknowledgments
This project was developed with the support of AI tools, which assisted in streamlining the development process and enhancing the application's functionality.

## Installation
To run this application locally:
1. Clone the repository to your local machine.
2. Ensure you have a local server environment set up (e.g., XAMPP, Laragon).
3. Place the project folder in the server's root directory.
4. Access the application through your web browser using the local server URL.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

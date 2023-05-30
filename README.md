# Find My Pet Application
This web application uses CRUD functionality where a user can sign up, list a missing or found pet and send messages. A user can also edit their profile and their missing/found pets. 

The system is designed using a Model View Controller (MVC) architecture.


## Description
The application will allow a user to register an account and create their profile. A welcome email is then sent to the new user welcoming them to the application. 
The database also contains a column called ‘is_admin’. By changing is_admin to 1, the user becomes an administrator, unlocking the administrator features. 

## Build
The application was developed using Laravel 10 and Bootstrap 5.2
* Docker Desktop used to run the application
* Mailtrap used to simulate the user’s mailbox
* TablePlus used to display the MySQL database


## Features
* Authentication - Registration and Login
* Welcome user email
* Validation
* Error messages
* Image Upload
* Middleware
* Font Awesome Icons


### Standard User Features
Once registered/logged in, a standard user can avail of the following features:
* 	View the products listed on the site. This includes viewing a selection of 4 recently added items.
*	A user can view an index of items by category, e.g., Consoles or Mobiles. 
*	View the profile of an individual item.
*	Add items to cart
*	Remove items from cart
*	Order an item
*	Enter their card details to pay for the item
*   Select an option to pay with PayPal
* 	View their order history

### Administrator Features
In addition to standard user features, an administrator is provided with the following features:
*	List an item for sale
*	View all orders
*	Edit an item, e.g., Change the price of an item
*	Delete an item 
*	Update an order status, e.g., Change status from Pending to Dispatched

## Stripe payment
To use the Stripe payment system, a user is required to enter the following card details
* Name: Test
* Card Number: 4242 4242 4242 4242
* CVC: 987
* Expiry Date M/Y: 12/2034

Further information on Stripe Payments can be found at: https://stripe.com/docs/testing

## PayPal payment
To pay using PayPal, a user is required to have a live PayPal account. 
To use PayPal with this app, the user is required to log into PayPal developer using the link https://developer.paypal.com/home 
The following details are required to integrate PayPal with the application.
* A sandbox account, which can be created through PayPal developer
* A Client ID and Secret ID
* The Client ID and Secret ID should be added to the .env file
* The customer email address and password can be found by viewing the details within the personal user sandbox account
* The email and password are used to log into PayPal to complete the test transaction



## Licence
Copyright 2023 Kevin O'Kane

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

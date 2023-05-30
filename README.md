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
* Share to social media
* Database query can identify a matching microchip number in a missing pet and found pet profile


### Standard User Features
Once registered/logged in, a standard user can avail of the following features:
* Add a missing pet profile
* Add a found pet profile
* Send/Receive public messages on pet profile
* Send/Receive private messages on pet profile
* View index of missing, found and reunited profiles
* View other individual pet profiles
* Share pet profiles to Facebook and WhatsApp


### Administrator Features
In addition to standard user features, an administrator is provided with the following features:
* Ability to delete user and pet profiles
* View messages sent to Find My Pet
* Feature to be added includes ability to view statistics




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

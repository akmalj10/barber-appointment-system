# Barber Appointment System

## Group Information

**Group Name**: KBI
**Section**: 6

**Group Members** :
- MUHAMAD NABIL FIKRI BIN MD SAAD - 2319549
- MUHAMAD AKMAL BIN JAMAL - 2313745
- MUHAMMAD AFIQ ADLI BIN MOHD ZHURI - 2317655
- MUHAMMAD DANIEL SUFI BIN MD DESA - 2312877


## Project Overview

Introduction :
Barber Appointment System is a web-based appointment booking system developed using Laravel framework with JavaScript support. The application allows customers to register, browse barber services, book appointments, and manage their own bookings. All appointment records are linked to authenticated users, ensuring each customer can only view and control their personal appointments.

The system focuses on self-service booking without complex admin approval, providing a simple and direct scheduling platform.

## Project Objectives

- Primary Goal: Create a functional appointment platform for barber services
- Technical Goal: Implement Laravel MVC architecture with full CRUD operations
- User Experience Goal: Provide a simple and responsive booking interface
- Business Goal: Reduce manual booking process through digital system

## Target Users

- Customers: Individuals who want to book barber services online
- System Users: Registered users managing their own appointments

## Features and Functionalities

**Customer Features**

- User Registration & Login using Laravel Authentication
- View available barber services
- Book appointment with:
    - Name
    - Phone
    - Email
    - Service selection
    - Date
    - Time (hour, minute, am/pm)
- View My Appointments page
- Cancel appointment (status becomes “Canceled”)
- Appointment status tracking
- Profile management

**Service Management Features**

- Create new service
- Edit service
- Delete service
- View service list

## Technical Implementation

**Technology Stack**

- Backend Framework: Laravel
- Frontend: Blade Templates with JavaScript
- Database: MySQL
- Authentication: Laravel Breeze
- Styling: Tailwind CSS
- Development Environment: XAMPP

**Database Design**

Database Schema Overview
Our database consists of main tables designed for users, services and bookings:

Core Tables:

- users - Registered customer accounts
- services - Barber services
- bookings - Appointment records
- sessions - Authentication sessions

### Entity Relationship Diagram (ERD)

https://docs.google.com/document/d/1Az6RY5CiBZO0ZJlmjUVgpjqM8HirKianz2oMZHqEAU0/edit?usp=sharing

Key Relationships:

- Users can have multiple Bookings (One-to-Many)
- Services can be referenced in many Bookings (One-to-Many)

**Laravel Components Implementation**

- Routes (Web.php)
  
php
`// Booking Routes`
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

`// User Appointment Routes`
Route::middleware(['auth'])->group(function () {
Route::get('/appointments', [BookingController::class, 'listAppointments'])->name('appointments.index');
Route::patch('/appointments/{id}/cancel', [BookingController::class, 'cancel'])->name('appointments.cancel');});

`// // Service CRUD`
Route::resource('services', ServiceController::class);

- Controllers
  
  **Main Controllers Implemented are below :**

  1. BookingController: Handles booking creation, listing and cancellation
  2. ServiceController: Handles CRUD operations for services
  3. OProfileController: User profile management
  4. Auth Controllers: Login, Register, Password Reset (Laravel Breeze)

- Models and Relationships
  
`// Booking Model`
class Booking extends Model {
protected $fillable = [
'user_id','name','phone','email',
'service','date','time','status'
];
}

`// Service Model`
class Service extends Model {
protected $fillable = [
'name','price','duration'
];
}

- Views and User Interface

  **Blade Templates Structure:**
    - welcome.blade.php - Homepage
    - booking.blade.php - Appointment form
    - appointments.blade.php - User appointments
    - dashboard.blade.php - User dashboard
    - my-appointments.blade.php - Appointment list

   **Design Features:**
    - Responsive design using Tailwind
    - Simple booking form with validation
    - Status display for each appointment
    - Authentication-based navigationg


## User Authentication System

### ** Authentication Features**
- **Registration System**: Create new user account
- **Login System**: Secure authentication
- **Password Reset**: Email recovery
- **Profile Management**: Update user information

### **Security Measures**
- Password hashing
- CSRF protection
- Laravel validation
- Auth middleware to protect appointments

## Installation and Setup Instructions
### Prerequisites :
- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL 8.0
- XAMPP 

### Step-by-Step Installation

1. Clone the Repository

bash
git clone barber-appointment-system
cd barber-appointment-system
create setup for database [database.txt]

2. Install Dependencies

bash
composer install
npm install

3. Environment Configuration

bash
cp .env.example .env
php artisan key:generate

4. Database Setup

bash
php artisan migrate

5. Start Development Server

bash
php artisan serve
npm run dev

## Testing and Quality Assurance

###  Functionality Testing

 - User registration and login
 - Service browsing
 - Appointment booking
 - Appointment cancellation
 - Service CRUD
 - Form validation
 - User-only appointment access

### Browser Compatibility

-  Google Chrome (Latest)
-  Mozilla Firefox (Latest)
-  Microsoft Edge (Latest)

### Performance Testing

- Page load times under 3 seconds
- Database queries optimized
- Image compression implemented
- Responsive design tested on multiple screen sizes


## Challenges Faced and Solutions
### Challenge 1: Time Formatting
- Problem: Time input separated into hour, minute, am/pm
- Solution: Combined into single string before database storage
### Challenge 2: User Data Protection
- Problem: Prevent user from viewing others appointments
- Solution: Filter using Auth::id() in BookingController
### Challenge 3: Form Validation
- Solution: Laravel request validation rules

## Future Enhancements
### Phase 2 Features (Potential Improvements)
- Email Notification after booking
- Calendar style time picker
- Service image upload
- Prevent double booking logic

### Scalability Considerations

- Database indexing
- API for mobile version
- Enhanced time slot management

## Learning Outcomes
### Technical Skills Gained

- Laravel Framework: Understanding of MVC architecture and Eloquent ORM
- CRUD Operations: Implemented Create, Read, Update, and Delete functions for barber services and appointments, allowing full data management through the web interface.
- Authentication System: Learned to implement secure user registration, login, password reset, and session management using Laravel Breeze authentication.
- Blade + JavaScript Integration: Developed dynamic user interfaces using Blade templates combined with JavaScript for form validation and interactive booking features.
- Database Relationships: UDesigned and implemented relational database structures linking users, services, and bookings to ensure data integrity.

### Soft Skills Developed

- **Team Collaboration** : Working effectively in a group environment
- **Project Management** : Planning and executing a complex web application
- **Problem Solving** : Debugging and resolving technical challenges
- **Documentation** : Creating comprehensive project documentation
- **GitHub Usage** : Practiced version control including committing code, pushing updates, and managing the project repository collaboratively.


## References

1. Laravel Documentation. (2024). Laravel 10.x documentation. Laravel Official Website. https://laravel.com/docs/10.x
2. Laravel Breeze Documentation. (2024). Laravel Breeze – authentication starter kit. Laravel Official Website. https://laravel.com/docs/10.x/starter-kits#laravel-breeze
3. MySQL Documentation. (2024). MySQL 8.0 reference manual. Oracle Corporation. https://dev.mysql.com/doc/refman/8.0/en/
4. MDN Web Docs. (2024). Web Development Resources. Retrieved from https://developer.mozilla.org/
5. Stack Overflow. (2024). Programming Q&A Platform. Retrieved from https://stackoverflow.com/
6. GitHub Docs. (2024). GitHub version control and collaboration guide. GitHub Inc. https://docs.github.com/
7. W3Schools. (2024). HTML, CSS, and JavaScript tutorials. Refsnes Data. https://www.w3schools.com/


## Conclusion
Barber Appointment System successfully implements a self-service appointment platform using Laravel framework. The final product allows users to register, book services, view appointments, and cancel bookings without admin intervention, matching the actual GitHub implementation.

### Key Achievements

- Implemented booking management
- Service CRUD module
- User authentication
- Protected user data access
- Responsive interface

### Project Impact
This project demonstrates real-world web development using Laravel MVC and provides practical experience in building a functional appointment system.

- Project Completion Date: 16/1/2026
- Course: INFO 3305 Web Application Development
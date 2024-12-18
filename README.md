# TLE1-Agency Installation Guide
This installation Guide provides you with the required steps to get this project running on your local machine. 
It also includes an overview of our key features and suggestions for further development.

## Prerequisites
Before you begin, ensure you have the following installed on your local machine:

- PHP (>=7.3)
- Composer
- Node.js and npm
- Git

## Installation Steps

### Clone the Repository
Open your terminal and run the following command to clone the repository:

```bash
git clone https://github.com/Mathijs-04/TLE1-Agency.git
```
Navigate into the project directory:

```bash
cd TLE1-Agency
```
### Install PHP Dependencies
Use Composer to install the required PHP dependencies:

```bash
composer install
```
### Install Node.js Dependencies
Use npm to install the required Node.js dependencies:

```bash
npm install
```
### Set Up Environment Variables
Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```
Generate the application key:

```bash
php artisan key:generate
```
Open the `.env` file and configure your database and other settings as needed.

### Run Database Migrations
Run the following command to set up the database tables:

```bash
php artisan migrate
```
### Compile Assets
Compile the assets:

```bash
npm run dev
```

### Serve the Application
Start the Laravel development server:

```bash
php artisan serve
```
Your application should now be running at `http://localhost:8000`.

<br>
<br>
<br>

# TLE1-Agency Feature overview

## Key Features
The key features of our web application are designed to simplify the process for employers looking to post job vacancies and manage their hiring process. Below are the main features available in the platform:

- **Employer Company Page**: Employers can create a detailed company page that showcases important information about their company or branch, providing transparency to job seekers.
  
- **Job Vacancy Creation**: Employers have the ability to create job vacancies by filling out all necessary details, such as job description, requirements, and location, to attract the right candidates.

- **Vacancy Management**: Employers can manage existing job vacancies by viewing, editing, or deleting them as needed. This provides flexibility in managing their open positions.

- **Staff Invitations**: Employers can invite potential candidates to join their company by sending invitations for their first working day directly from the job vacancy listing.

- **Invitation Status**: Employers can track the status of their invitations, ensuring they are aware of who has accepted or declined, and can follow up as necessary.

These features create a seamless and efficient experience for employers, enabling them to manage their hiring process from start to finish in one platform.

## Suggestions for Further Development
While the scope we have chosen for the project has been developed, this does not mean the web application is fully ready for use. Before it is fully complete, several additional functionalities need to be worked on. Some suggestions for further development are:

- **Job Vacancy Viewing Page for Job Seekers**: A page where job seekers can browse available vacancies, view details about the roles, and filter listings based on their preferences.

- **Job Seeker Registration System**: A system allowing job seekers to register on the platform, providing them with the ability to apply for jobs and manage their profiles.

- **Additional Information Page about Open Hiring for Job Seekers**: A dedicated page offering detailed information on the Open Hiring process, guiding job seekers on how to apply and what to expect from the system.

- **Admin Page for Open Hiring**: An admin page that allows the Open Hiring team to oversee existing company accounts, assist companies as needed, and prevent fraudulent activities on the platform.

These additional features would enhance the functionality of the platform, creating a more comprehensive system for both employers and job seekers, while also maintaining administrative control.

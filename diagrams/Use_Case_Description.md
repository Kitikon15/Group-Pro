# Use Case Description Document for WEB-NPRU University Admission System

## 1. Introduction

### 1.1 Purpose
This document provides detailed descriptions of the use cases for the WEB-NPRU University Admission System. It outlines the interactions between users and the system, including the requirements, flows, and business rules for each use case.

### 1.2 Scope
The WEB-NPRU University Admission System is designed to facilitate the university admission process by providing a platform where applicants can register, track their applications, and access admission information. Administrators can manage applications, news, courses, personnel, and system settings.

### 1.3 Definitions
- **Applicant**: A prospective student who wishes to apply for admission to the university
- **Administrator**: A university staff member who manages the admission process and system
- **System**: The WEB-NPRU application system

## 2. Use Case Descriptions

### 2.1 Applicant Use Cases

#### Use Case ID: UC-01
**Use Case Name**: View Admission Information
**Brief Description**: The applicant views general admission information and requirements.
**Actor**: Applicant
**Preconditions**: System is operational.
**Postconditions**: Applicant has access to admission information.

**Main Success Scenario**:
1. Applicant accesses the university website.
2. System displays homepage with admission information.
3. Applicant navigates to admission section.
4. System displays admission requirements and process information.

**Alternative Flows**:
- 2a. If applicant is already logged in, system may redirect to dashboard.

**Business Rules**:
- Information must be current and accurate.
- Content must follow university guidelines.

#### Use Case ID: UC-02
**Use Case Name**: Register for Admission
**Brief Description**: The applicant completes the admission registration process.
**Actor**: Applicant
**Preconditions**: Applicant has necessary documentation.
**Postconditions**: Applicant account is created; application data is stored.

**Main Success Scenario**:
1. Applicant navigates to admission registration page.
2. System displays registration form.
3. Applicant fills in personal information.
4. Applicant fills in educational background.
5. Applicant submits form.
6. System validates information.
7. System creates applicant account.
8. System logs applicant in automatically.
9. System redirects applicant to dashboard.

**Alternative Flows**:
- 6a. If validation fails, system displays error messages.
- 7a. If applicant already exists, system uses existing account.

**Business Rules**:
- All fields marked as required must be completed.
- Email addresses must be unique.
- ID card numbers must follow Thai ID format (13 digits).
- GPA must be between 0.00 and 4.00.
- Applicant must be at least 15 years old.

#### Use Case ID: UC-03
**Use Case Name**: View Application Status
**Brief Description**: The applicant checks the status of their application.
**Actor**: Applicant
**Preconditions**: Applicant is logged in.
**Postconditions**: Applicant views current application status.

**Main Success Scenario**:
1. Applicant accesses dashboard.
2. System displays application summary.
3. Applicant views application status.
4. System displays current status and next steps.

**Business Rules**:
- Only the logged-in applicant can view their own application status.
- Status information must be current and accurate.

#### Use Case ID: UC-04
**Use Case Name**: Edit Application Information
**Brief Description**: The applicant updates application information after initial submission.
**Actor**: Applicant
**Preconditions**: Applicant is logged in and has submitted an application.
**Postconditions**: Application information is updated in the system.

**Main Success Scenario**:
1. Applicant accesses dashboard.
2. System displays application summary.
3. Applicant selects "Edit Information" option.
4. System displays editable application form.
5. Applicant updates information.
6. Applicant submits updated information.
7. System validates and saves changes.
8. System confirms successful update.

**Alternative Flows**:
- 7a. If validation fails, system displays error messages.

**Business Rules**:
- Only editable fields can be modified after a certain point in the process.
- All validation rules from initial registration apply.

#### Use Case ID: UC-05
**Use Case Name**: View Program Information
**Brief Description**: The applicant views information about available programs and quotas.
**Actor**: Applicant
**Preconditions**: System has program information available.
**Postconditions**: Applicant views program information.

**Main Success Scenario**:
1. Applicant navigates to program information page.
2. System displays list of faculties.
3. Applicant selects a faculty.
4. System displays programs in that faculty.
5. System shows quota information for each program.

**Business Rules**:
- Information must be current and reflect actual program offerings.
- Quota information must be accurate and up-to-date.

#### Use Case ID: UC-06
**Use Case Name**: View Application Process
**Brief Description**: The applicant understands the step-by-step application process.
**Actor**: Applicant
**Preconditions**: System has application process information available.
**Postconditions**: Applicant views application process steps.

**Main Success Scenario**:
1. Applicant navigates to application process page.
2. System displays step-by-step guide.
3. Applicant reviews each step of the process.

**Business Rules**:
- Process information must be clear and easy to understand.
- Steps must be presented in logical order.

#### Use Case ID: UC-07
**Use Case Name**: Logout
**Brief Description**: The applicant ends their session securely.
**Actor**: Applicant
**Preconditions**: Applicant is logged in.
**Postconditions**: Applicant session is terminated.

**Main Success Scenario**:
1. Applicant selects "Logout" option.
2. System invalidates session.
3. System redirects to homepage.

**Business Rules**:
- Session must be completely invalidated for security.
- All sensitive data must be cleared from the session.

### 2.2 Administrator Use Cases

#### Use Case ID: UC-08
**Use Case Name**: Login to Admin System
**Brief Description**: The administrator accesses the administrative dashboard.
**Actor**: Administrator
**Preconditions**: Administrator has valid credentials.
**Postconditions**: Administrator is authenticated and logged in.

**Main Success Scenario**:
1. Administrator navigates to admin login page.
2. System displays login form.
3. Administrator enters credentials.
4. Administrator submits form.
5. System validates credentials.
6. System redirects to admin dashboard.

**Alternative Flows**:
- 5a. If validation fails, system displays error message.

**Business Rules**:
- Credentials must match those in the system.
- Failed login attempts may be limited to prevent brute force attacks.

#### Use Case ID: UC-09
**Use Case Name**: View Admission Reports
**Brief Description**: The administrator views reports on admission applications.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Admission report data is displayed to the administrator.

**Main Success Scenario**:
1. Administrator accesses admission report page.
2. System displays summary statistics.
3. System displays list of applicants.
4. Administrator can filter applicants by criteria.
5. Administrator can view detailed applicant information.

**Alternative Flows**:
- 4a. Administrator applies filters to applicant list.
- 4b. Administrator sorts applicant list by different criteria.
- 5a. Administrator views detailed information of a specific applicant.

**Business Rules**:
- Only authenticated administrators can access reports.
- Reports should only show data relevant to the current admission cycle.
- Personal information should be protected and only accessible to authorized personnel.

#### Use Case ID: UC-10
**Use Case Name**: Edit Admission Reports
**Brief Description**: The administrator updates admission report information.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Admission report information is updated in the system.

**Main Success Scenario**:
1. Administrator accesses admission report page.
2. Administrator selects "Edit" option.
3. System displays editable report form.
4. Administrator updates statistics.
5. Administrator updates applicant information.
6. Administrator submits changes.
7. System validates and saves changes.
8. System confirms successful update.

**Business Rules**:
- Only authorized administrators can modify report data.
- All changes must be logged for audit purposes.

#### Use Case ID: UC-11
**Use Case Name**: Manage News and Announcements
**Brief Description**: The administrator creates, edits, and deletes news and announcements.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: News and announcements are updated in the system.

**Main Success Scenario (Create)**:
1. Administrator accesses news management page.
2. System displays list of existing news items.
3. Administrator selects to create new item.
4. System displays news form.
5. Administrator fills in news details.
6. Administrator submits form.
7. System validates and saves news item.
8. System confirms successful operation.

**Main Success Scenario (Edit)**:
1. Administrator accesses news management page.
2. System displays list of existing news items.
3. Administrator selects existing item to edit.
4. System displays news form with current data.
5. Administrator modifies details.
6. Administrator submits form.
7. System validates and updates news item.
8. System confirms successful operation.

**Main Success Scenario (Delete)**:
1. Administrator accesses news management page.
2. System displays list of existing news items.
3. Administrator selects existing item to delete.
4. System prompts for confirmation.
5. Administrator confirms deletion.
6. System removes news item.
7. System confirms successful operation.

**Business Rules**:
- News titles must be unique.
- News content must not exceed system limits.
- Only published news items appear on public website.
- Administrators can only edit/delete news they created (unless they have higher privileges).

#### Use Case ID: UC-12
**Use Case Name**: Manage Courses Information
**Brief Description**: The administrator creates, edits, and deletes course information.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Course information is updated in the system.

**Main Success Scenario**:
1. Administrator accesses course management page.
2. System displays list of existing courses.
3. Administrator selects to create new course or edit existing course.
4. System displays course form.
5. Administrator fills in course details.
6. Administrator submits form.
7. System validates and saves course information.
8. System confirms successful operation.

**Business Rules**:
- Course names must be unique within the system.
- Course information must be accurate and up-to-date.

#### Use Case ID: UC-13
**Use Case Name**: Manage Personnel Information
**Brief Description**: The administrator creates, edits, and deletes personnel information.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Personnel information is updated in the system.

**Main Success Scenario**:
1. Administrator accesses personnel management page.
2. System displays list of existing personnel.
3. Administrator selects to create new personnel or edit existing personnel.
4. System displays personnel form.
5. Administrator fills in personnel details.
6. Administrator submits form.
7. System validates and saves personnel information.
8. System confirms successful operation.

**Business Rules**:
- Personnel information must be accurate and up-to-date.
- Sensitive personnel data must be protected.

#### Use Case ID: UC-14
**Use Case Name**: Manage System Settings
**Brief Description**: The administrator configures system-wide settings.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: System settings are updated in the system.

**Main Success Scenario**:
1. Administrator accesses system settings page.
2. System displays current settings.
3. Administrator modifies settings as needed.
4. Administrator saves changes.
5. System validates and saves settings.
6. System confirms successful update.

**Business Rules**:
- Only administrators with appropriate permissions can modify system settings.
- Changes to settings must not disrupt system operation.

#### Use Case ID: UC-15
**Use Case Name**: View Faculty and Program Quotas
**Brief Description**: The administrator views and manages faculty and program quotas.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Faculty and program quota information is updated in the system.

**Main Success Scenario**:
1. Administrator accesses faculty/program quota page.
2. System displays quota information for all programs.
3. Administrator can view detailed quota statistics.
4. Administrator can edit quota information.
5. Administrator submits changes.
6. System validates and saves quota information.
7. System confirms successful update.

**Business Rules**:
- Quota information must be accurate and reflect actual capacity.
- Changes to quotas should only be made during appropriate periods.

#### Use Case ID: UC-16
**Use Case Name**: Manage Application Process Information
**Brief Description**: The administrator updates information about the application process.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Application process information is updated in the system.

**Main Success Scenario**:
1. Administrator accesses application process management page.
2. System displays current process steps.
3. Administrator can edit process steps.
4. Administrator submits changes.
5. System validates and saves process information.
6. System confirms successful update.

**Business Rules**:
- Process information must be clear and up-to-date.
- Changes to process information should be carefully reviewed before publishing.

#### Use Case ID: UC-17
**Use Case Name**: Logout from Admin System
**Brief Description**: The administrator ends administrative session securely.
**Actor**: Administrator
**Preconditions**: Administrator is logged in.
**Postconditions**: Administrator session is terminated.

**Main Success Scenario**:
1. Administrator selects "Logout" option.
2. System invalidates session.
3. System redirects to admin login page.

**Business Rules**:
- Session must be completely invalidated for security.
- All sensitive data must be cleared from the session.

## 3. Non-Functional Requirements

### 3.1 Performance Requirements
- System must respond to user actions within 3 seconds
- System must support multiple concurrent users

### 3.2 Security Requirements
- User data must be protected according to privacy regulations
- System must prevent unauthorized access to administrative functions
- All authentication credentials must be securely stored

### 3.3 Usability Requirements
- System must be accessible on desktop and mobile devices
- User interface must be intuitive and easy to navigate

### 3.4 Reliability Requirements
- System must maintain 99.5% uptime
- System must handle errors gracefully and provide meaningful error messages

## 4. Assumptions and Dependencies

### 4.1 Assumptions
- Applicants have access to the internet and necessary devices
- University staff will receive appropriate training on the system
- The system will have proper internet infrastructure

### 4.2 Dependencies
- Database system for data storage
- Web server for hosting the application
- Email service for notifications (if implemented)
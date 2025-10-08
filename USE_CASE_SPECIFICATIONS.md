# Detailed Use Case Specifications for WEB-NPRU

## Overview
This document provides detailed specifications for key use cases in the WEB-NPRU University Admission System.

## Use Case Specification Template

### UC-02: Register for Admission (Detailed Specification)

#### Brief Description
An applicant fills out and submits an admission application form to apply for enrollment at the university.

#### Actors
- Primary: Applicant
- Secondary: System

#### Preconditions
- Applicant has access to the internet
- Applicant has necessary personal and educational documentation
- System is operational

#### Postconditions
- Applicant account is created in the system
- Applicant is logged into the system
- Application data is stored in the database
- Applicant is redirected to the dashboard

#### Main Success Scenario (Happy Path)
1. Applicant navigates to the admission registration page
2. System displays the registration form with required fields
3. Applicant fills in personal information (name, ID, address, contact details)
4. Applicant fills in educational background (school, GPA, graduation year)
5. Applicant reviews entered information
6. Applicant submits the form
7. System validates all required fields are completed
8. System checks for duplicate applicant based on ID/email
9. System creates new applicant account or uses existing one
10. System stores application data
11. System automatically logs applicant in
12. System redirects applicant to the dashboard with success message

#### Alternative Flows

**AF-02-01: Validation Errors**
1. When validating form data (Step 7), system detects missing or invalid information
2. System highlights problematic fields
3. System displays specific error messages for each issue
4. Applicant corrects information
5. Applicant resubmits form
6. System continues with main success scenario from Step 7

**AF-02-02: Duplicate Applicant**
1. When checking for duplicates (Step 8), system finds existing applicant with same email/ID
2. System uses existing applicant account
3. System updates application data with new information
4. System continues with main success scenario from Step 10

#### Exception Flows

**EF-02-01: System Error During Account Creation**
1. System encounters error while creating account (Steps 9-10)
2. System displays technical error message
3. System logs error for administrator review
4. Applicant is advised to try again later or contact support

**EF-02-02: Database Connection Failure**
1. System cannot connect to database during data storage (Step 10)
2. System displays connection error message
3. System logs error for administrator review
4. Applicant is advised to try again later

#### Business Rules
- All fields marked as required must be completed
- Email addresses must be unique
- ID card numbers must follow Thai ID format (13 digits)
- GPA must be between 0.00 and 4.00
- Applicant must be at least 15 years old

#### Special Requirements
- Form must be responsive and work on mobile devices
- All data must be encrypted during transmission
- System must prevent SQL injection attacks
- System must handle concurrent submissions gracefully

#### Frequency of Occurrence
This use case is executed frequently during admission periods, potentially hundreds of times per day.

#### Open Issues
- Need to determine if attachments (documents) will be supported in future versions
- Consider integration with government databases for identity verification

### UC-09: View Admission Reports (Detailed Specification)

#### Brief Description
An administrator accesses and views reports on admission applications to monitor the admission process.

#### Actors
- Primary: Administrator
- Secondary: System

#### Preconditions
- Administrator is authenticated and logged into the system
- System has admission data available

#### Postconditions
- Admission report data is displayed to the administrator
- System logs the report access

#### Main Success Scenario (Happy Path)
1. Administrator navigates to the admission report page
2. System retrieves summary statistics from database
3. System retrieves applicant list from database
4. System displays summary statistics (total applicants, approved, pending, rejected)
5. System displays paginated list of applicants with key information
6. Administrator can interact with the report data

#### Alternative Flows

**AF-09-01: Filter Applicants**
1. Administrator selects filter criteria (faculty, program, status, date range)
2. Administrator applies filters
3. System updates applicant list based on filters
4. System recalculates summary statistics
5. System displays filtered results

**AF-09-02: Sort Applicants**
1. Administrator selects column to sort by
2. System reorders applicant list
3. System displays sorted results

**AF-09-03: View Detailed Applicant Information**
1. Administrator clicks on an applicant in the list
2. System retrieves detailed applicant information
3. System displays applicant details in modal or separate page

#### Exception Flows

**EF-09-01: Database Connection Failure**
1. System cannot retrieve data from database
2. System displays error message
3. System logs error for administrator review
4. Administrator is advised to try again later

**EF-09-02: No Data Available**
1. System finds no admission data in database
2. System displays message indicating no data is available
3. System provides option to return to previous page

#### Business Rules
- Only authenticated administrators can access reports
- Reports should only show data relevant to the current admission cycle
- Personal information should be protected and only accessible to authorized personnel

#### Special Requirements
- Report data must be updated in real-time or near real-time
- Large datasets should be paginated for performance
- System should support export of report data to CSV/Excel
- Interface should be responsive and work on different screen sizes

#### Frequency of Occurrence
This use case is executed regularly by administrators, multiple times per day.

#### Open Issues
- Consider adding chart visualizations for statistical data
- Determine if real-time notifications for new applications are needed

### UC-11: Manage News and Announcements (Detailed Specification)

#### Brief Description
An administrator creates, edits, and deletes news and announcements displayed on the university website.

#### Actors
- Primary: Administrator
- Secondary: System, Website Visitors

#### Preconditions
- Administrator is authenticated and logged into the system
- System has news management functionality available

#### Postconditions
- News and announcements are updated in the system
- Changes are reflected on the public website
- System logs all news management activities

#### Main Success Scenario (Happy Path) - Create News
1. Administrator navigates to news management page
2. System displays list of existing news items
3. Administrator selects "Create New News" option
4. System displays news creation form
5. Administrator fills in news title, content, and publication date
6. Administrator selects if news should be published immediately
7. Administrator submits form
8. System validates input data
9. System saves news item to database
10. System confirms successful creation
11. System updates public website with new news item

#### Main Success Scenario (Happy Path) - Edit News
1. Administrator navigates to news management page
2. System displays list of existing news items
3. Administrator selects existing news item to edit
4. System displays news editing form with current data
5. Administrator modifies news content as needed
6. Administrator submits updated form
7. System validates input data
8. System updates news item in database
9. System confirms successful update
10. System updates public website with modified news item

#### Main Success Scenario (Happy Path) - Delete News
1. Administrator navigates to news management page
2. System displays list of existing news items
3. Administrator selects existing news item to delete
4. System prompts administrator for confirmation
5. Administrator confirms deletion
6. System removes news item from database
7. System confirms successful deletion
8. System removes news item from public website

#### Alternative Flows

**AF-11-01: Schedule News for Future Publication**
1. During news creation (Step 5), administrator sets future publication date
2. System saves news item with scheduled status
3. System automatically publishes news item on scheduled date

**AF-11-02: Save as Draft**
1. During news creation or editing, administrator selects "Save as Draft"
2. System saves news item with draft status
3. News item is not published on public website
4. Administrator can later edit and publish draft

#### Exception Flows

**EF-11-01: Validation Errors**
1. When validating input data (Steps 8, 7, 8), system detects invalid information
2. System highlights problematic fields
3. System displays specific error messages
4. Administrator corrects information
5. Administrator resubmits form

**EF-11-02: Database Error**
1. System encounters error while saving data
2. System displays technical error message
3. System logs error for administrator review
4. Administrator is advised to try again later

#### Business Rules
- News titles must be unique
- News content must not exceed system limits
- Only published news items appear on public website
- Administrators can only edit/delete news they created (unless they have higher privileges)

#### Special Requirements
- News editor should support basic formatting (bold, italic, lists)
- System should prevent cross-site scripting attacks in news content
- Images should be supported in news content
- News should be categorized (e.g., admission, academic, events)

#### Frequency of Occurrence
This use case is executed occasionally, typically 1-5 times per week.

#### Open Issues
- Consider integration with social media for automatic sharing
- Determine if news should support multiple languages
# WEB-NPRU University Admission System - Design Documents

This directory contains all design documents for the WEB-NPRU University Admission System:

## Diagrams and Documents

1. **ER_Diagram.md** - Entity Relationship Diagram showing the database structure and relationships between entities
2. **Use_Case_Diagram.md** - Use Case Diagram illustrating the interactions between actors and system functions
3. **Use_Case_Description.md** - Detailed Use Case Description document with comprehensive specifications
4. **Class_Diagram.md** - Class Diagram showing the system's classes and their relationships

## System Overview

The WEB-NPRU University Admission System is a Laravel-based web application that facilitates the university admission process. It serves two main user types:

- **Applicants**: Prospective students who wish to apply for admission
- **Administrators**: University staff who manage the admission process and system content

## Key Features

- User registration and authentication
- Application submission and tracking
- News and announcement management
- Course information management
- Personnel information management
- System settings management
- Admission reporting
- Program quota information
- Application process guidance

## Technical Architecture

The system follows Laravel's MVC (Model-View-Controller) architecture:
- Models: Handle data and business logic
- Views: Present information to users
- Controllers: Process user input and interact with models

The system includes 5 main models: User, News, Course, Personnel, and Setting, each with appropriate attributes and relationships.
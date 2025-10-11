# University Admission System - UML Diagrams

This directory contains UML diagrams for the University Admission System project.

## Diagrams Included

1. **Use Case Diagram** (`use-case-diagram.md`) - Shows the interactions between users (Applicants and Admins) and system functions
2. **ER Diagram** (`er-diagram.md`) - Entity-Relationship diagram showing database structure and relationships
3. **Class Diagram** (`class-diagram.md`) - Object-oriented class structure with attributes and methods
4. **Activity Diagram** (`activity-diagram.md`) - Workflow diagram showing the application process flow
5. **All Diagrams** (`all-diagrams.md`) - Combined file with all diagrams

## How to View Diagrams

These diagrams are created using Mermaid syntax. You can view them in several ways:

### Option 1: Online Mermaid Editor
1. Go to [https://mermaid.live](https://mermaid.live)
2. Copy the content of any `.md` file
3. Paste it into the editor
4. The diagram will render automatically

### Option 2: VS Code with Mermaid Extension
1. Install the "Mermaid Preview" extension in VS Code
2. Open any `.md` file
3. Use the "Preview Mermaid Diagram" command

### Option 3: GitHub
1. Push these files to a GitHub repository
2. GitHub will automatically render the Mermaid diagrams

## Diagram Descriptions

### Use Case Diagram
Shows the functional requirements of the system from the perspective of different user roles:
- **Applicant**: Can apply for admission, check status, edit applications, view news, and view programs
- **Admin**: Can manage news, applications, programs, personnel, and view reports

### ER Diagram
Represents the database schema with entities and their relationships:
- **Users**: System users (applicants and admins)
- **Applications**: Student application forms
- **News**: News and announcements
- **Programs**: Academic programs and quotas
- **Personnel**: Faculty and staff information
- **Settings**: System configuration

### Class Diagram
Shows the object-oriented structure of the system with classes, attributes, methods, and relationships.

### Activity Diagram
Illustrates the workflow of the application process from user visit to enrollment completion.

## Usage
These diagrams can be used for:
- System documentation
- Developer onboarding
- Requirements analysis
- Database design
- Code architecture planning
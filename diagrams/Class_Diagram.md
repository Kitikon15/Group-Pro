# Class Diagram

## System Classes and Relationships

The WEB-NPRU University Admission System consists of several key classes that represent the core functionality of the application. These classes follow Laravel's MVC (Model-View-Controller) architecture pattern.

## Class Diagram

```mermaid
classDiagram
    class Model {
        <<abstract>>
        +timestamps()
    }
    
    class Authenticatable {
        <<interface>>
    }
    
    class User {
        -id: int
        -name: string
        -email: string
        -password: string
        -is_admin: boolean
        -email_verified_at: datetime
        -remember_token: string
        -created_at: datetime
        -updated_at: datetime
        +fillable: array
        +casts(): array
    }
    
    class News {
        -id: int
        -title: string
        -content: text
        -type: string
        -publish_date: date
        -status: string
        -author: string
        -image: string
        -created_at: datetime
        -updated_at: datetime
        +fillable: array
        +casts(): array
    }
    
    class Course {
        -id: int
        -name: string
        -description: text
        -degree_type: string
        -duration: int
        -status: string
        -created_at: datetime
        -updated_at: datetime
        +fillable: array
    }
    
    class Personnel {
        -id: int
        -name: string
        -position: string
        -bio: text
        -email: string
        -phone: string
        -image_url: string
        -status: string
        -created_at: datetime
        -updated_at: datetime
        +fillable: array
    }
    
    class Setting {
        -id: int
        -key: string
        -name: string
        -value: text
        -type: string
        -description: text
        -created_at: datetime
        -updated_at: datetime
        +fillable: array
    }
    
    class Controller {
        <<abstract>>
    }
    
    class LoginController {
        +showLoginForm()
        +login()
        +logout()
    }
    
    class NewsController {
        +index()
        +create()
        +store()
        +show()
        +edit()
        +update()
        +destroy()
    }
    
    class CourseController {
        +index()
        +create()
        +store()
        +show()
        +edit()
        +update()
        +destroy()
    }
    
    class PersonnelController {
        +index()
        +create()
        +store()
        +show()
        +edit()
        +update()
        +destroy()
    }
    
    class SettingController {
        +index()
        +create()
        +store()
        +show()
        +edit()
        +update()
        +destroy()
    }
    
    class GenericDataController {
        +index()
        +create()
        +store()
        +show()
        +edit()
        +update()
        +destroy()
    }
    
    class Request {
        <<abstract>>
    }
    
    class Route {
        <<static>>
        +get()
        +post()
        +put()
        +delete()
    }
    
    class View {
        <<static>>
        +make()
        +render()
    }
    
    %% Inheritance relationships
    Model <|-- User
    Model <|-- News
    Model <|-- Course
    Model <|-- Personnel
    Model <|-- Setting
    Controller <|-- LoginController
    Controller <|-- NewsController
    Controller <|-- CourseController
    Controller <|-- PersonnelController
    Controller <|-- SettingController
    Controller <|-- GenericDataController
    
    %% Implementation relationship
    Authenticatable <|.. User
    
    %% Usage relationships (dependency)
    LoginController ..> Request : uses
    NewsController ..> Request : uses
    CourseController ..> Request : uses
    PersonnelController ..> Request : uses
    SettingController ..> Request : uses
    GenericDataController ..> Request : uses
    
    LoginController ..> View : returns
    NewsController ..> View : returns
    CourseController ..> View : returns
    PersonnelController ..> View : returns
    SettingController ..> View : returns
    GenericDataController ..> View : returns
    
    Route ..> Controller : maps to
    
    %% Association relationships
    User ||--o{ News : creates
    User ||--o{ Personnel : manages
    
    %% Additional associations between models could be added here based on relationships
```

## Class Descriptions

### Model Classes

#### User Class
- **Purpose**: Represents the users of the system (applicants and administrators)
- **Attributes**:
  - id: Unique identifier
  - name: Full name
  - email: Email address (unique)
  - password: Hashed password
  - is_admin: Boolean to determine if user is an admin
  - email_verified_at: Timestamp when email was verified
  - remember_token: Token for "remember me" functionality
  - created_at/updated_at: Timestamps for auditing
- **Relationships**: Can create multiple news items, can be associated with personnel

#### News Class
- **Purpose**: Represents news and announcements on the website
- **Attributes**:
  - id: Unique identifier
  - title: Title of the news item
  - content: Detailed content of the news
  - type: Type of news (e.g., ข่าวสาร, กิจกรรม)
  - publish_date: Date when news should be published
  - status: Status of the news (draft, published)
  - author: Author of the news
  - image: Image associated with the news
  - created_at/updated_at: Timestamps for auditing
- **Relationships**: Belongs to a user (author)

#### Course Class
- **Purpose**: Represents academic program information
- **Attributes**:
  - id: Unique identifier
  - name: Name of the course
  - description: Detailed description
  - degree_type: Level of degree (e.g., ปริญญาตรี, ปริญญาโท)
  - duration: Duration of the course
  - status: Status of the course (เปิดรับ, ปิดรับ)
  - created_at/updated_at: Timestamps for auditing
- **Relationships**: None defined in current implementation

#### Personnel Class
- **Purpose**: Represents university staff members
- **Attributes**:
  - id: Unique identifier
  - name: Name of the personnel
  - position: Job position
  - bio: Biography
  - email: Contact email
  - phone: Contact phone number
  - image_url: URL for profile image
  - status: Employment status (ทำงาน, ลาออก)
  - created_at/updated_at: Timestamps for auditing
- **Relationships**: None defined in current implementation

#### Setting Class
- **Purpose**: Represents system configuration settings
- **Attributes**:
  - id: Unique identifier
  - key: Unique key identifier for the setting
  - name: Display name of the setting
  - value: Value of the setting
  - type: Data type of the setting
  - description: Description of what the setting controls
  - created_at/updated_at: Timestamps for auditing
- **Relationships**: None defined in current implementation

### Controller Classes

#### LoginController
- **Purpose**: Handles authentication for administrators
- **Methods**:
  - showLoginForm(): Displays the login form
  - login(): Processes login attempts
  - logout(): Processes logout requests

#### NewsController
- **Purpose**: Manages news and announcement CRUD operations
- **Methods**: 
  - index(): Displays list of news
  - create(): Shows form to create news
  - store(): Saves new news item
  - show(): Displays specific news item
  - edit(): Shows form to edit news
  - update(): Updates existing news item
  - destroy(): Deletes news item

#### CourseController
- **Purpose**: Manages course information CRUD operations
- **Methods**:
  - index(): Displays list of courses
  - create(): Shows form to create course
  - store(): Saves new course
  - show(): Displays specific course
  - edit(): Shows form to edit course
  - update(): Updates existing course
  - destroy(): Deletes course

#### PersonnelController
- **Purpose**: Manages personnel information CRUD operations
- **Methods**:
  - index(): Displays list of personnel
  - create(): Shows form to create personnel
  - store(): Saves new personnel
  - show(): Displays specific personnel
  - edit(): Shows form to edit personnel
  - update(): Updates existing personnel
  - destroy(): Deletes personnel

#### SettingController
- **Purpose**: Manages system settings CRUD operations
- **Methods**:
  - index(): Displays list of settings
  - create(): Shows form to create setting
  - store(): Saves new setting
  - show(): Displays specific setting
  - edit(): Shows form to edit setting
  - update(): Updates existing setting
  - destroy(): Deletes setting

#### GenericDataController
- **Purpose**: Provides generic CRUD operations for other data types
- **Methods**:
  - index(): Displays list of data
  - create(): Shows form to create data
  - store(): Saves new data
  - show(): Displays specific data
  - edit(): Shows form to edit data
  - update(): Updates existing data
  - destroy(): Deletes data

### Other Components

#### Route Class
- **Purpose**: Defines URL routing for the application
- **Methods**: get(), post(), put(), delete() - for defining HTTP routes

#### View Class
- **Purpose**: Handles the rendering of user interfaces
- **Methods**: make(), render() - for creating and displaying views

## Architecture Notes

1. The system follows Laravel's MVC architecture pattern
2. Models extend the base Model class and include traits like HasFactory and Notifiable
3. Controllers handle the business logic for different modules
4. Views are stored separately and rendered as needed
5. The system implements proper authentication and authorization mechanisms
6. Data is validated through form requests and model fillable properties
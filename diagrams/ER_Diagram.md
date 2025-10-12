# Entity Relationship Diagram

## Entities and Attributes

### User
- id (Primary Key)
- name
- email (Unique)
- password
- is_admin (boolean)
- email_verified_at
- remember_token
- created_at
- updated_at

### News
- id (Primary Key)
- title
- content
- type (ข่าวสาร, กิจกรรม)
- publish_date
- status (ร่าง, เผยแพร่)
- author
- image
- created_at
- updated_at

### Course
- id (Primary Key)
- name
- description
- degree_type (ปริญญาตรี, ปริญญาโท)
- duration
- status (เปิดรับ, ปิดรับ)
- created_at
- updated_at

### Personnel
- id (Primary Key)
- name
- position
- bio
- email
- phone
- image_url
- status (ทำงาน, ลาออก)
- created_at
- updated_at

### Setting
- id (Primary Key)
- key (Unique)
- name
- value
- type (string, text, boolean, integer, etc.)
- description
- created_at
- updated_at

## Relationships

```mermaid
erDiagram
    USER {
        int id PK
        string name
        string email UK
        string password
        boolean is_admin
        datetime email_verified_at
        string remember_token
        datetime created_at
        datetime updated_at
    }
    
    NEWS {
        int id PK
        string title
        text content
        string type
        date publish_date
        string status
        string author
        string image
        datetime created_at
        datetime updated_at
    }
    
    COURSE {
        int id PK
        string name
        text description
        string degree_type
        int duration
        string status
        datetime created_at
        datetime updated_at
    }
    
    PERSONNEL {
        int id PK
        string name
        string position
        text bio
        string email
        string phone
        string image_url
        string status
        datetime created_at
        datetime updated_at
    }
    
    SETTING {
        int id PK
        string key UK
        string name
        text value
        string type
        text description
        datetime created_at
        datetime updated_at
    }
    
    USER ||--o{ NEWS : creates
    USER ||--o{ PERSONNEL : employs
```
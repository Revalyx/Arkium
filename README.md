<p align="center">
  <a href="https://github.com/Revalyx/Arkium" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Arkium Logo">
  </a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/backend-Laravel-red" alt="Backend">
  <img src="https://img.shields.io/badge/API-RESTful-blue" alt="API">
  <img src="https://img.shields.io/badge/status-in%20development-yellow" alt="Status">
  <img src="https://img.shields.io/badge/license-MIT-green" alt="License">
</p>

## About Arkium

**Arkium** is an **API-first backend** built with **Laravel**, designed to act as a **centralized personal archive** for tracking and reflecting on consumed media such as:

- 🎬 Movies  
- 📺 TV Series  
- 📚 Books  
- 🎮 Video games  

The project prioritizes **robust architecture**, **security**, and **long-term scalability**, allowing multiple clients (mobile, desktop, or web) to consume the same backend seamlessly.

Arkium is intentionally **frontend-agnostic**, serving as a clean and reusable core for future applications.

---

## Core Features

- User registration and authentication
- Secure token-based API access
- Media tracking (movies, series, books, games)
- Association with creators (authors, directors, studios)
- Consumption dates and metadata
- Reviews, personal notes, and critiques
- Designed for progressive expansion

---

## Architecture Principles

Arkium follows a strict **API-only architecture**:

- RESTful endpoints
- Stateless authentication
- Clear separation of concerns
- Versioned API (`/api/v1`)
- Database schema controlled exclusively through migrations
- Clients consume the same API regardless of platform

This architecture allows Arkium to power:
- Mobile applications
- Web applications
- Desktop clients
- External services

---

## Tech Stack

- Framework: Laravel  
- Language: PHP  
- Database: MySQL / PostgreSQL (SQLite for local development)  
- Authentication: Token-based API authentication (OAuth-ready)  
- ORM: Eloquent  
- Version Control: Git  

---

## Development Setup

### Requirements

- PHP 8.x or higher
- Composer
- MySQL or PostgreSQL (recommended for production)

### Installation

1. Install project dependencies  
2. Create a `.env` file from the example  
3. Generate the application key  
4. Run database migrations  
5. Start the local development server  

The API will be available at:
http://127.0.0.1:8000

---

## Database Management

All database structure is managed using **Laravel migrations**.

- Migrations ensure the database schema is reproducible across environments
- No manual SQL is required
- Production and local schemas remain in sync

For local resets, a fresh migration can be executed.

---

## Roadmap

Planned features include:

- Google OAuth authentication
- External metadata integration
- Advanced search and filtering
- Ratings and reactions
- Privacy levels for user content
- Optional public profiles and sharing

---

## Contributing

Arkium is currently developed as a personal backend project.  
Feedback, ideas, and constructive contributions are welcome.

---

## Security

If you discover a security vulnerability, please report it responsibly and avoid creating public issues.

---

## License

Arkium is open-source software licensed under the **MIT license**.

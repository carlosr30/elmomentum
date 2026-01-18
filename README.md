# elmomentum 🏃‍♂️

**elmomentum** is a community leaderboard for a running club, powered by the Strava API.  
It syncs athletes and activities from Strava to generate time-based leaderboards (e.g. quarterly challenges) and highlight consistency, distance, and effort across the group.

The goal is simple: **make running together more motivating**.

---

## ✨ Features

- 🔐 **Strava OAuth 2.0 authentication**
- 🔄 **Automatic activity syncing** from Strava
- 🧱 **Extensible sync pipeline** (designed to support other providers in the future)

---

## 🛠 Tech Stack

- **Backend:** Laravel (PHP)
- **HTTP Client:** Laravel HTTP / Guzzle
- **Auth:** OAuth 2.0 (Strava)
- **Database:** MySQL
- **Queue:** Laravel Queues (for syncing activities)
- **API Provider:** Strava API

## 🚧 Project Status

**elmomentum is currently in active development.**

Features, data models, and APIs are still evolving, and breaking changes may occur.  
The project is being built incrementally, starting with Strava integration and core syncing logic before expanding to leaderboards and UI.

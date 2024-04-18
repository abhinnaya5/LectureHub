# **LectureHub SQL Database**

Welcome to the LectureHub SQL Database README!

## Overview
This repository contains the SQL database schema and related documentation for LectureHub, a website offering a wide range of video lectures on various topics.

## Database Structure
The LectureHub SQL database is structured to efficiently manage and store information about users, lectures, categories, and other relevant data. Here's a brief overview of the main tables:

- **Users**: Stores information about registered users, including user ID, username, email, and hashed passwords.
- **Lectures**: Contains details about individual video lectures, such as lecture ID, title, description, duration, and associated category ID.
- **Categories**: Stores information about lecture categories, including category ID and category name.
- **Bookmarks**: Tracks users' bookmarked lectures, linking user IDs with lecture IDs.

## SQL Files
- **schema.sql**: This file contains the SQL schema definition for creating the LectureHub database tables.
- **sample_data.sql**: Provides sample data to populate the database tables for testing and development purposes.
- *(Add additional SQL files for migrations, seed data, or other database operations as necessary)*

## Contributing
Contributions to the LectureHub SQL database schema and related files are welcome! If you have suggestions for improvements or would like to report issues, please feel free to open an issue or submit a pull request.

## Support
If you have any questions or need assistance with the LectureHub SQL database, don't hesitate to reach out by opening an issue or contacting the project maintainers.

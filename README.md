Laravel 5 GoogleAPI application

This is an application developed for a nursery to enable the parents book events for their children. There are three authentication
groups which are Parent, Admin and Teacher. Google API has been deployed in order to facilitate booking calendar functionality.
The Admin can create new events, view events and view school club booking as well edit payments. As part of the view events, the 
Admin is able to update or delete any records. While on the Parent side, the user is able to view the events and book a free slot. 
The availability of the time slots has been displayed by green colour, and red colour illustrates the unavailable slots. The 
Teacher group could view calendar events and create a free time slot for the parents.

The application has implemented MYSQL for the back end to store necessary data. To run the application you need to create database
and name it "eventbooking". The username is "root" with empty password. The following command could create database migration to 
create database tables:


    php artisan migrate

The working prototype version of this application is online with the following URL:

    http://jacknursery.co.uk/


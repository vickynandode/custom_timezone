# custom_timezone
To see the set timezone and the current time.
- Add an ADMIN CONFIGURATION form which will take the following inputs:
Country - text field
City - text field
Timezone - select list
Options in the select list
America/Chicago
America/New_York
Asia/Tokyo
Asia/Dubai
Asia/Kolkata
Europe/Amsterdam
Europe/Oslo
Europe/London
- Create a service that will return the current time based on the time zone selection in the above form. Time should be in the format 25th Oct 2019 - 10:30 PM
- Add a Plugin block which will render the Location from the configuration set in the ACF and the current time calling the service in the previous step. Pass the variables to a template to be rendered.


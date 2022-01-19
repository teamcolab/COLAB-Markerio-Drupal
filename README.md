# COLAB-Markerio-Drupal

This is a module for integration of Marker.io on Drupal 8/9 sites. It is heavily borrowed from a [contributed module](https://www.drupal.org/project/markerio) and modified to better suit Colab clients by taking into account Pantheon environments.

When enabled and [configured](#configuration), the Marker.io widget will appear on all non production Pantheon environments regardless of the current user's authentication status. This allows for reporting of bugs/errors that may only be seen by anonymous users.

On a production environment, the widget will only appear to those with appropriate permissions.

You will likely never see it on a local environment.

Keep in mind that settings on the Marker.io account side may work against any settings done here as it has ultimate authority of what domains it appears on.

## Add to a project

Since this is hosted in Github we have to be a little more verbose in how we add this via composer.

In your `composer.json` file, inside `"repositories": []` add this block:
```
{
  "type": "package",
  "package": {
    "name": "colab/colab_markerio",
    "type": "drupal-module",
    "version": "dev-master",
    "source": {
      "type": "git",
      "url": "https://github.com/teamcolab/COLAB-Markerio-Drupal.git",
    }
  }
}
```
> Remember that if this is the not the last package added in this manner to add a comma after the last closing curly brace. If it IS the last, remove it.

Then run this command:
`lando composer require colab/colab_markerio:dev-master`

## Configuration

1. Set up a Marker.io account
2. Configure Marker.io
   1. *TODO: Get steps from TC*
3. Get the Destination key from the created account
4. Enable Colab Markerio
   1. `lando drush en colab_markerio`
   2. `terminus drush {project}.{env} en colab_markerio`
5. Enter the Destination key in the field on the Marker.io configuration form
   1. `/admin/config/system/markerio`
   2. **Configuration > System > Marker.io**
6. Save the form
7. Set the permissions for who should be allowed to see the widget on production
   1. `/admin/people/permissions#module-colab_markerio`
   2. Generally giving access to `Authenticated User` is adequate
   3. If the client wants their non-logged in visitors to submit bugs then add `Anonymous User` as well
8. Export configurations
   1. Refer to config managment documentation for these steps
   2. The export should provide 1-2 user configs and 1 module config


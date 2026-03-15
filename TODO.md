# To Do

A list of things for the developer to do for future releases. This list can change, so just because something is listed here doesn't mean it will be implemented.

## High Priority

- Create a bash script for backing up configuration files, and content files, so user can easily upgrade. Create a companion bash script for applying the backup.

- Item pages should have a way for me to paste in code snippets from comment system providers like Disqus somehow. This can't come from a regular configuration file, because it needs to support mult-line values. Perhaps I can reconfigure the global configs and local configs scripts to detect if they should get the value using single line or multilien function by checking how the Content line is configured.

## Medium Priority

- Add support for uploads to have thumbnails. This could be done with a .jpg.thumbnail file. The user would create this manually, and script for database would use it to decide if it should display that or default icon. MAYBE JUST DO IMAGE UPLOADS AND MAKE THE THUMBNAILS AUTOMATICALLY?

- In portrait (mobile) when social bio heading is active, make the picture display above the bio name, and text. This way it fits better.

## Low Priority

- Update each PHP script to use UUIDs to create a unique ID for each function, which can be prefixed to all its variables, so that I can use more generic naming across files, without messing things up if they are eval'd or included. The UUID would be "uuid_" then a unique string, then "_", and then the descritive name. The unique string would be an md5 checksum of a timestamp and the project name.

## Consider

- Abandon JSON for search/browse? Instead store the entire database of information in the HTML page as hidden entries, and display and just use Javascript to decide which ones to display when, and to create prev/next buttons. While not as friendly for large sites, it would lessen the need for horrible Javascript, and keep the code much cleaner.

- When copying uploads to the public uploads directory, the age is evaluated, and the total number of uploads being copied is evaluated. However, it's not done in order, so while these rules are honoured, it won't necessarily be the X number of most recent files kept, it will be X number that meet the age requirement, regardless of whether there's a newer file that also does. Fixing this would allow the most recent files to be kept.

- In search feature, add support for filtering by tags. This means the database will need to be updated to support adding tags to items, while also supporting untagged items. I probably won't do this, because avoiding back-end work is part of the purpose of this project's design. However, for things like posts, and status updates, where the user already has to create the content, it would make sense, and if you're implementing it for that, might as well add support across the board.

- Add theme support by allowing numbered versions of CSS files, and creating a configuration file that specifies which number to use. If there is no CSS of that number it would fall back to the default number. The default theme would be number 1.

- Clean up the code.

- Instead of things being global, or localized, consider global, shared, individual and find a way to allow the generators for different types (posts, status updates, etc) to use shared.

- Re-organize to:
 - "/" for default repo files like README.md
 - "/Meta" for information about the project
  - "/Meta/Dev" for information about the project for the devs (e.g., BUGS.md)
 - "/App" for the application
  - "/App/Demo" for example scripts that run an app (not applicable to this project)
 - "/Temporary" for any test writing, default paths (not applicable to this project)
 - "/www" (aka "/Content")
 - "/Resources" for additional files to help users, or developers.
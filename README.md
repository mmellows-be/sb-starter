# SoBold's Starter Theme

Welcome to SoBold's Starter Theme! This README will guide you through the structure of the theme, the purpose of each directory, and how to effectively work with the theme.

## Theme Structure

- **css**: Contains the compiled `main.css` file for styling.
- **elements**: Divided into subdirectories:
  - **components**: Holds non-ACF components.
  - **layout**: Includes files for hero, footer, navigation, etc.
  - **pagebuilder**: Contains ACF Flexible Content related files.
- **inc**: Houses theme logic and functionality:
  - **app**: Custom theme logic resides here.
  - **ajax**: AJAX related tasks can be found here.
- **js**: JavaScript logic.
- **scss**: Utilizes a subset of the 7-1 pattern:
  - **abstracts**: Includes functions, variables, and mixins.
  - **base**: Holds the base styling.
  - **components**: Files for styling components.
  - **layout**: Styling for layout elements.
  - **pagebuilder**: Styling for ACF Flexible Content.
  - **pages**: Specific page-related styling. (e.g. 404, archives)
- **template-parts**: Houses common WordPress template parts.
- Hierarchy files: Includes `index.php`, `archive.php`, etc.
- **functions.php**: Contains theme functions and configurations.
- **style.css**: Theme's main stylesheet.

## Usage

### Components

- Non-ACF components are located in `elements/components`.
- These components can be reused across the site.
- Use appropriate classes and modifiers to maintain consistency.

### Layout

- Layout elements such as header, footer, and navigation are in `elements/layout`.
- Modify these files to adjust the overall site structure.

### ACF Flexible Content

- Files related to ACF Flexible Content are in `elements/pagebuilder`.
- Files inside this folder are auto generated from content-pagebuilder, when accessing the front end that uses that block.
- This directory should only host php files

### JavaScript

- JavaScript logic can be added to files within the `js` directory.
- Use modular and organized code for better maintainability.

### Styling

- SCSS files in the `scss` directory follow the 7-1 pattern.
- Utilize appropriate files based on the type of styling needed.
- Most folders have a `_index.scss` file to simplify imports into `main.scss`

#### Abstracts

This subfolder hosts `_functions.scss`, `_mixins.scss`, `_variables`
Imports for this folder are directly added to `main.scss`

#### Base

This subfolder hosts `_base.scss`. This file holds all the base styles for a given project.
More files can be added here to extend the base styling, each file should output a set of styles that are global and used across the site (e.g. Animations)

#### Components

This subfolder contains `_index.scss` with imports from each component folder.
A new component should be added as a sub directory with a single file (e.g. `_cards.scss`).
As a simpler approach, components file can be added into this folder on root level without the use of subfolders.

#### Layout

This subfolder contains `_index.scss` with imports from each layout file.
Layout files will be named like the layout part they're styling (e.g. `_hero.scss`), and will be directly imported into `_index.scss`

#### Pagebuilder

This subfolder contains `_pagebuilder.scss`, with generated imports from each block folder
Each file is generated when accessing the frontend with `pagebuilder.php` as template

#### Pages

This subfolder container `_index.scss` with import from each page file.
Page files will be named like the page/context they're styling (e.g. `_404.scss`, `_home.scss`, `_team.scss`)

### AJAX

- AJAX tasks and functionality can be developed in the `inc/ajax` directory.
- Keep AJAX tasks modular and well-documented.
- AJAX tasks should follow the WP-REST design pattern.

### Custom Theme Logic

- Add custom theme logic in the `inc/app` directory.
- Organize code logically and comment thoroughly.
- These files can follow either procedural or OOP approach.

### Template Parts

- Common template parts can be found in `template-parts`.
- Use these template parts in your hierarchy files.

## Design Patterns

### AJAX Flow

1. Create file in ./inc/ajax/{nameOfFile}.php.
2. (optional) The file can be placed in a subdirectory should the site have many ajax tasks.
3. Add require of specific ajax file in ./inc/ajax/init.php.
4. Enqueue and Localize the related JS file using `wp_enqueue_script`.
5. Place the JS file in an ajax subdirectory in ./js/ajax.
6. Add the rest routes with `rest_api_init`.
7. Follow HTTP verbs accordingly, most of the times it will either be `POST` or `GET`.
8. Define the routes according to REST best practices, avoid using verbs in it (e.g. `getPosts`). The HTTP verb with the endpoint should provide clarity (e.g. `GET: /article/`).
9. Follow `v1` as endpoint base, extending to newer version should the API need updating, without losing backward compatibility.
10. Add the rest handler, following the `WP_REST_Request` pattern.
11. The rest handler should always return a `WP_REST_Response`, more details below
12. Add the logic to call the endpoint from the js ajax file

```
return new WP_REST_Response([
  'status' => 200 // or appropriate
  'data'   => [
    'key'  => $value,
  ]
]);
```

### Component Flow

1. Develop individual components in `elements/components`.
2. Reuse these components across the site by including them where needed.

## Conclusion

SoBold's Starter Theme follows a structured organization to make development more organized and efficient. Utilize the provided directories for specific purposes, follow design patterns for AJAX and components, and enjoy building your WordPress theme with clarity and ease!

For further assistance, feel free to refer to the comments in the codebase or contact our support team.

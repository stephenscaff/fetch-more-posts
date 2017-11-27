# WpFetchMorePosts

A Wp load more posts example using the Fetch API, as oppose to jQuery ajax.
This doesn't use wp enpoints, instead fetching html content from the pagination urls, using fetch's text() response type.

I suppose v2 would probably consist of registered custom endpoints and using front-end mustache-like templates (or Handlebars), but I need something fast for my increasingly Jquery-free project, so here we are.

## Functionality

Essentially, on click, we fetch the appropriate pagination url, add it to a documentFrament (via createDocumentFragment) so we can snag just our posts, and then add to our post's container with insertAdjacentHTML.

## Required Markup

Add the `#js-posts` id to you posts container. Then, `get_template_part()` the `partial-fetch-more.php` below your posts section.

This approach is actual pretty nice / performant since it doesn't create any reflow.

## Loading animation

Do whateves. An `'is-animating` class is added to the link container during loading, so you can show a preloader or so on. As for the posts entrance, you could keep it lightweight with a css animation fade in, like:

```
.post + .post {
  animation: fade-in 0.7s 0.25s ease both
}

@keyframes fade-in {
  0%   { opacity: 0; }
  100% { opacity: 1; }
}
```

## Not a plugin...

This isn't a plugin. Just some functionality to be baked into your custom theme development.
I generally put such things in an `inc` directory, to be included within `functions.php`

Of course, you could easily wrap this into a legit plugin, and add some options for this and that.

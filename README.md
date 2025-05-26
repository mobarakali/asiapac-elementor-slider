# Asiapac Elementor Slider

Initially, I created this slider plugin to solve a problem with the Elementor slider widget. The default Elementor slider widget does not support layouts combining an image with content side by side. This plugin allows users to create such custom sliders using Elementor templates.

For example, you can design a layout in Elementor with an image on the left and content on the right, save it as a template, and then use a shortcode to include it in a slick-powered slider.

Thus, this plugin enables you to create sliders with **any custom design**!

---

## Features

- Create sliders using Elementor templates.
- Build sliders that combine images and content in one slide.
- Easy to use via shortcode.
- Slick Slider integration with autoplay, arrows, and dots.

---

## Installation

1. Download the plugin from the WordPress repository or upload it to your WordPress site.
2. Activate the plugin from the WordPress admin panel.
3. Create Elementor templates with your desired slide designs.
4. Use the shortcode:

   ```
   [asiapac_elementor_slider ids="1371,1335"]
   ```

   Replace `1371,1335` with the actual IDs of your Elementor templates.

---

## Usage

To use the plugin:

- Design your slides using Elementor.
- Save each slide design as an Elementor **Template**.
- Use the `[asiapac_elementor_slider]` shortcode with one or more template IDs.

Example:

```php
[asiapac_elementor_slider ids="101,102,103"]
```

Each template will be rendered as a slide.

---

## Contributing

We welcome contributions from the community. If you'd like to improve this plugin:

1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Submit a pull request.

---

## Third-Party Libraries

This plugin uses the following third-party library:

- [Slick Slider](https://github.com/kenwheeler/slick) by Ken Wheeler – MIT License

Slick Slider is included via CDN and is used to power the slider functionality.

---

## License

This plugin is licensed under the **GPLv2 or later**.

It also includes [Slick Slider](https://github.com/kenwheeler/slick), which is distributed under the **MIT License**.

Please see the LICENSE file for full details.

---

## Support

For support, open an issue on the [GitHub repository](https://github.com/mobarakali/asiapac-elementor-slider)<!--  or ask in the WordPress support forums-->.

---

## Changelog

### 1.0.0

- Initial release of the Asiapac Elementor Slider plugin.

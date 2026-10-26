# Third-party resource notices

## iHover — MIT declaration from upstream README

The iHover-derived core in `css/ihover.css` corresponds to the public CSS project at [`gudh/ihover`, tag 1.0.0](https://github.com/gudh/ihover/tree/1.0.0), whose [tagged README](https://github.com/gudh/ihover/blob/1.0.0/README.md) states “Licensed under MIT.” The tag's `src/ihover.css` is the reference source (128,769 bytes; SHA-256 `39287e21e842ee862367b62c053db93baf8ebf48d3ca231ab024811bc661c1c0`). The release commit metadata identifies `gudh` as author/committer; the upstream files do not name a copyright holder and the tag contains no standalone `LICENSE`/`COPYING` file or complete MIT text. This notice records the upstream license declaration and source without inventing a copyright holder or claiming an upstream license file exists.

The shipped stylesheet is a modified composite, not a byte-identical upstream copy. The plugin-specific `.ihe-fade`, Filterable Gallery, and Image Swap integration rules remain local; square effects 16–20 have been removed from the 4.4.0 candidate because they are absent from the supported shortcode options, saved fixture content, and plugin PHP/JS consumers. Custom markup or hand-authored shortcode values that used those five non-listed square effect classes will no longer receive their former effect styles. Existing Bootstrap/Normalize/H5BP comments remain in the stylesheet; this notice does not assert unverified component boundaries or copyright ownership for those markers.

## Animate.css — MIT

Animate.css material is included in `css/animate.css`, with upstream attribution to **Copyright (c) 2015 Daniel Eden**. The complete MIT license text referenced by the official Animate.css v3.3.0 source header is provided in [`licenses/animatecss/LICENSE`](licenses/animatecss/LICENSE). The upstream tagged repository identifies Animate.css as MIT licensed, and its CSS header links to the MIT license; the v3.3.0 tag does not provide a standalone license file. The bundled file is a shortened/modified derivative; v3.3.0 is the closest documented candidate, not an established exact upstream version. Local modifications' provenance and authorization have not been independently established. This notice records the verifiable upstream MIT attribution and does not claim that the whole modified file's origin or rights have been independently proven.

## Hover.css 2.0.2 — MIT

Hover.css material is included in `css/hoverbtn.css`, attributed to **Copyright (c) 2014–2015 Ian Lunn**. The exact official v2.0.2 MIT license text is provided in [`licenses/hovercss/LICENSE`](licenses/hovercss/LICENSE). The bundled file is a modified derivative containing selected upstream effects, descendant-`span` adaptations, and Mega-named button styling. The local modification provenance/authorization is not independently established; the notice does not claim the entire modified file has independently verified provenance or rights.

## Slick Carousel 1.8.1 — MIT

The Slick JavaScript and core/theme styles in `js/slick.js`, `css/slick.css`, and `css/slick-theme.css` are byte-identical to the authenticated `slick-carousel@1.8.1` npm distribution published for `kenwheeler/slick` tag `v1.8.1` (tag commit `0f40c9d6a02a5c08b5f4dd80fdada3a854a59bee`). The four arrow-font files `css/fonts/slick.eot`, `css/fonts/slick.svg`, `css/fonts/slick.ttf`, and `css/fonts/slick.woff` are also byte-identical to that distribution. The complete upstream MIT text is provided in [`licenses/slick/LICENSE`](licenses/slick/LICENSE); its SHA-256 matches the package license file.

`css/slick-carousal.css` is the plugin integration stylesheet, kept separate from the upstream Slick files. It contains the Advanced Carousel layout, arrow/font-icon and dot appearance, and responsive overrides extracted from the prior combined stylesheet. The arrow glyph styling references the separately bundled Font Awesome assets; it does not add a runtime request. This notice covers only the Slick 1.8.1 material and does not clear unrelated Font Awesome assets, picker artwork, or broader plugin licensing/rightsholder questions.

The local plugin does not ship Slick's minified JavaScript build, loader GIF, or source maps. See the MA-04B79 report for the exact source verification, file inventory, retained integration styles, and compatibility scope.

## Tooltipster 4.2.7 — MIT

The complete upstream MIT license text and copyright notice are provided in [`licenses/tooltipster/LICENSE`](licenses/tooltipster/LICENSE). These terms apply to the seven verified Tooltipster v4.2.7 vendor assets included in this distribution:

- `js/tooltipster.bundle.min.js`
- `css/tooltipster.bundle.min.css` (the upstream bundle stylesheet followed by the five theme styles below)
- `js/themes/tooltipster-sideTip-borderless.min.css`
- `js/themes/tooltipster-sideTip-light.min.css`
- `js/themes/tooltipster-sideTip-noir.min.css`
- `js/themes/tooltipster-sideTip-punk.min.css`
- `js/themes/tooltipster-sideTip-shadow.min.css`

The copyright attribution is **Copyright (c) 2012, 2016 Caleb Jacob and Louis Ameline**. Preserve the complete copyright and permission notice in copies or substantial portions. The license does not cover the separate plugin integration files `js/tooltip.js` or `css/tooltip.css`.

## Typed.js 1.1.4 — MIT

Typed.js by Matt Boldt is included at `js/typed.js`. The complete MIT license and attribution are retained in that file's header: **Copyright (c) 2014 Matt Boldt**. The bundled source corresponds to upstream Typed.js v1.1.4; see the [official v1.1.4 source](https://github.com/mattboldt/typed.js/blob/v1.1.4/js/typed.js) and [tagged package metadata](https://github.com/mattboldt/typed.js/blob/v1.1.4/package.json). Plugin-specific initialization is in `js/customTyper.js` and is not part of the upstream library.

## Filterizr 2.2.4 — MIT

The pinned vanilla browser distribution is included at `js/filterizr.min.js`. It is the unmodified `dist/vanilla.filterizr.min.js` from the official Filterizr repository at commit `5455dcd06212e7c3e5c3dc25b6aeefa00b72c8d4` (SHA-256 `5c8d4f8ad21cd14dd88ad54eaa8ca51fd88b85b3e6f971df935d8d95ba27ec7a`), copyright (c) 2016 Yiotis Kaltsikis. The MIT notice is in `licenses/gallery/filterizr-MIT.txt`. The browser distribution bundles `fast-memoize` 2.5.1, `imagesloaded` 4.1.4, and `ev-emitter` 1.1.1; their MIT attribution/license materials are in `licenses/gallery/fast-memoize-MIT.txt`, `licenses/gallery/imagesloaded-notice.txt`, `licenses/gallery/imagesloaded-upstream-README.md`, `licenses/gallery/ev-emitter-notice.txt`, and `licenses/gallery/ev-emitter-upstream-README.md`. The plugin integration in `js/filterizr.js` and presentation stylesheet `css/filterizr.css` are first-party GPL-2.0-or-later code, not part of the upstream Filterizr distribution. This selected release is a documented compatibility recovery candidate, not a claim about the historical original bundled version.

## fsLightbox Basic 3.8.0 — MIT

The unmodified Basic browser bundle is included at `js/fslightbox.js`. It matches the official `index.js` from [banthagroup/fslightbox](https://github.com/banthagroup/fslightbox) at commit `32b63aeb1e02e4780e40e610aa66e05d645e078a` (SHA-256 `20e4e8a88e74b50eb1149a143a3d585d11554fd50e77e3e91969470e5ebf36f6`; 31,069 bytes). The exact MIT license and copyright notice, **Copyright (c) Piotr Zdziarski**, are provided in [`licenses/gallery/fslightbox-MIT.txt`](licenses/gallery/fslightbox-MIT.txt). This is a verified compatibility candidate and is not represented as the historical original bundled version. Plugin-specific Gallery rendering/enqueue integration is separate from the vendor code.


## Font Awesome Free 5.12.0 — MIT / SIL OFL 1.1 / CC BY 4.0

Font Awesome Free 5.12.0 by **@fontawesome** (package author: Dave Gandy; upstream project: FortAwesome). The official release license is provided in [`licenses/fontawesome/LICENSE.txt`](licenses/fontawesome/LICENSE.txt). The 52 bundled asset paths are `css/font-awesome/css/all.css`, `css/font-awesome/less/*.less` (18 source files), `css/font-awesome/scss/*.scss` (18 source files), and `css/font-awesome/webfonts/fa-{brands-400,regular-400,solid-900}.{eot,svg,ttf,woff,woff2}` (15 font files). The compiled stylesheet's relative font URLs resolve to that webfonts directory.

The official 5.12.0 distribution assigns **MIT** to non-font/non-icon code (CSS, Less and SCSS code), **SIL Open Font License 1.1** to web and desktop font files, and **CC BY 4.0** to icon artwork distributed as standalone SVG/JS icon assets. This plugin's current 52-file Font Awesome bundle contains no standalone SVG or JS icon assets; the `.svg` files under `webfonts/` are font files and are covered by the font allocation. Preserve the attribution comment in `css/font-awesome/css/all.css` and the complete upstream license text.

Font Awesome brand icons remain trademarks of their respective owners; use logos only to represent the applicable company, product, or service. The upstream terms do not imply endorsement. The plugin preserves Font Awesome 4-compatible class shims for saved icon class compatibility.

## jQuery Countdown 2.1.0 and JQPlugin 1.0.2 — MIT

`js/jquery.countdown.js` contains Keith Wood's jQuery Countdown 2.1.0; `js/countdown.min.js` contains the JQPlugin 1.0.2 prerequisite, as well as the separately credited John Resig Simple JavaScript Inheritance helper. Countdown and JQPlugin identify the MIT terms published on [Keith Wood's official license page](http://keith-wood.name/licence.html), reproduced in [`licenses/countdown/LICENSE`](licenses/countdown/LICENSE) (**Copyright 2007–2015 Keith Wood**). The readable Countdown code is normalized-equivalent to the author-hosted 2.1.0 source, with a local commented-line difference. The minified JQPlugin/helper composition is not exact-hash matched to a separately versioned upstream artifact.

The inheritance helper's embedded banner credits **John Resig** and states “MIT Licensed” (`http://ejohn.org/`). No standalone license file for that helper was identified; its terms are recorded from the bundled attribution rather than represented by a reconstructed upstream license file. Preserve that banner in `js/countdown.min.js`. The adjacent `css/jquery.countdown.css` is a separately modified derivative with the 2.0.0 header; two upstream default declarations are commented out. It is documented here as Keith Wood MIT-derived CSS, not as part of the JavaScript version claim. Plugin integration is in `js/front-js/countdown.js`; no runtime files were changed for this notice update.

## Waypoints 2.0.3 — MIT / GPL dual license

Waypoints code is one component within `js/count-up.js`, bounded by its `jQuery Waypoints - v2.0.3` banner and the following CounterUp banner. The exact-tag upstream `licenses.txt` identifies **Copyright (c) 2011–2012 Caleb Troughton** and provides the complete MIT license at [`licenses/waypoints/licenses.txt`](licenses/waypoints/licenses.txt). The bundled v2.0.3 header additionally states **Copyright (c) 2011–2013 Caleb Troughton** and declares dual licensing under MIT and GPL. The normalized Waypoints code matches the official v2.0.3 distribution; use of its documented MIT option is recorded here. Keep the bundled header and the MIT copyright/permission text. The header's later copyright-year range is preserved as found; this notice does not assert why it differs from the exact-tag license file.

## CounterUp 1.0 — GNU GPL version 2 only

The CounterUp component is separately bounded in `js/count-up.js` by the `jquery.counterup.js 1.0` banner, which credits **Copyright 2013 Benjamin Intal** and says “Released under the GPL v2 License.” Its code matches the official Counter-Up 1.0 tagged component after comment/whitespace normalization. The exact official tag's complete GPL version 2 license is provided in [`licenses/counterup/LICENSE`](licenses/counterup/LICENSE). The source and license establish GPLv2, not an “or later” grant; Waypoints' MIT alternative does not change CounterUp's terms. The final initializer in `js/count-up.js` is plugin integration, not part of either upstream component. The current active consumer is `mvc_counter`.

**Combined-file scope:** `js/count-up.js` is not wholly MIT licensed. Preserve both upstream component boundaries and their distinct notices; plugin-specific initialization remains separately identifiable.

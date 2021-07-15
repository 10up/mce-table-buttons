# Changelog

All notable changes to this project will be documented in this file, per [the Keep a Changelog standard](http://keepachangelog.com/).

## [Unreleased] - TBD
- Issues reported by PHPCS WPCS v2.3.0 addressed

## [3.3] - 2018-06-15
### Changed
- Significantly update TinyMCE plugin from 4.1.x to 4.7.11
- Drop support for WordPress 3.x, which means dropping TinyMCE 3.x and 4.0.x

## [3.2] - 2014-08-24
### Changed
- WordPress 4.0 support, including a much newer TinyMCE plugin, with many new features, including background color and horizontal alignment
- Dramatically improved support for paragraphed content inside of a cell (paragraph breaks no longer disappear on save)

## [3.1] - 2014-05-31
### Changed
- Updated core TinyMCE table plugin from 4.0.20 to 4.0.21 in sync with WordPress - mostly bug and accessibility fixes
- Refactored for compatibility with plugins like Advanced Custom Fields that do not use the_editor hook

## [3.0] - 2014-04-01
### Changed
- Support for WordPress 3.9 and newer, which includes a major visual editor upgrade (TinyMCE 4)

## [2.0] - 2012-11-18
### Added
- New button icons that better conform with WordPress's editor design
- Retina (HiDPI) ready button icons!

### Changed
- Upgraded to latest version of TinyMCE tables plugin (fixes a lot of edge case bugs)
- Rewrote code for hiding / display toolbar with kitchen sink (now a TinyMCE plug-in instead of a workaround) - the table buttons no longer briefly appear before page loading is finished

## [1.5] - 2011-12-23
### Changed
- Table toolbar is hidden or displayed along with the kitchen sink (yay!)
- Minor clean up to code base and files; optimized for WordPress 3.3

## [1.0.4] - 2011-03-27
### Changed
- Updated TinyMCE table plug-in to corresponding TinyMCE update in WordPress 3.1 (still supports <3.1 too)

## [1.0.3.1] - 2011-02-22
### Changed
- Updated support / developer information

## [1.0.3] - 2011-01-17
### Changed
- Code clean up, 3.1 testing

## [1.0.2] - 2010-11-16
### Changed
- Minor code clean up

### Fixed
- Editor save warning appearing for unchanged content when the table is at the bottom of the editor

## [1.0.1] - 2009-12-08
### Fixed
- Issue with WebKit browsers (Safari and Chrome) - TinyMCE bug

## [1.0] - 2009-11-06
- Initial plugin release :tada:

[Unreleased]: https://github.com/10up/mce-table-buttons/compare/trunk...develop
[3.3]: https://github.com/10up/mce-table-buttons/commit/7b1f57e
[3.2]: https://plugins.trac.wordpress.org/changeset/971857/
[3.1]: https://plugins.trac.wordpress.org/changeset/924344/
[3.0]: https://plugins.trac.wordpress.org/changeset/924344/
[2.0]: https://plugins.trac.wordpress.org/changeset/626531/
[1.5]: https://plugins.trac.wordpress.org/changeset/479678/
[1.0.4]: https://plugins.trac.wordpress.org/changeset/365544/
[1.0.3.1]: https://plugins.trac.wordpress.org/changeset/349281/
[1.0.3]: https://plugins.trac.wordpress.org/changeset/333541/
[1.0.2]: https://plugins.trac.wordpress.org/changeset/312235/
[1.0.1]: https://plugins.trac.wordpress.org/changeset/180734/
[1.0]: https://plugins.trac.wordpress.org/changeset/170960/

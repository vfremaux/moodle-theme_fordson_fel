// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Javascript controller for controlling the sections.
 *
 * @module     theme_archaius/flex_section_control
 * @package    theme_archaius
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['jquery', 'core/config', 'core/log'], function($, config, log) {

    /**
     * SectionControl class.
     *
     * @param {String} selector The selector for the page region containing the actions panel.
     */
    var flexsection_control = {
        init: function(attribs) {

            M.course.id = attribs;

            // Attach togglestate handler to all flexsections in page.
            $('.flexcontrol').on('click', this.togglestate);

            // Attach global processings.
            $('.flexsection-global-control').on('click', this.processglobal);

            $('.flexsections > .section > .content > .sectionname').on('click', this.proxysectionnameevent);
            log.debug('AMD Flex sections control initialized');
        },

        // Init_editing will NOT take control of section name.
        init_editing: function(attribs) {

            M.course.id = attribs;

            // Expand everything.
            $('.section.sub > .content > .section-content').css('display', 'block');
            $('.section.sub > .content > .section-content').css('visibility', 'visible');
            $('.section.sub > .content > .summary').css('display', 'block');
            $('.section.sub > .content > .summary').css('visibility', 'visible');
            $('.section.sub >.content > .flexsections').css('display', 'block');
            $('.section.sub >.content > .flexsections').css('visibility', 'visible');
            $('img.flexcontrol').attr('src', $('img.flexcontrol').attr('src').replace('collapsed', 'expanded'));

            // If collapse mode enabled in editing
            // Attach togglestate handler to all flexsections in page.
            $('.flexcontrol').on('click', this.togglestate);

            // Attach global processings.
            $('.flexsection-global-control').on('click', this.processglobal);

            // Dim toggle buttons. (if collapse mode disabled in edting.
            /*
            $('.flexsection-global-control').addClass('dimmed');

            // Attach togglestate handler to all flexsections in page.
            // $('.flexcontrol').on('click', this.togglestate);
            $('.flexcontrol').css('display', 'none');
            */

            log.debug('AMD Flex sections control initialized');
        },

        proxysectionnameevent: function(e) {

            e.stopPropagation();
            e.preventDefault();
            var handle = $(this).find('img');
            handle.trigger('click');

        },

        togglestate: function(e, hide) {

            e.stopPropagation();
            e.preventDefault();
            var that = $(this);

            var regex = /control-([0-9]+)-section-([0-9]+)/;
            var matchs = regex.exec(that.attr('id'));
            var sectionid = parseInt(matchs[1]);
            var sectionsection = parseInt(matchs[2]);
            regex = /level-([0-9]+)/;
            matchs = regex.exec(that.attr('class'));
            var level = parseInt(matchs[1]);

            log.debug('Working for flex section ' + sectionsection + ' of id ' + sectionid);

            var url = config.wwwroot + '/theme/fordson_fel/sections/ajax/register.php?';
            url += 'sectionid=' + sectionid;
            var handlesrc = $('#control-' + sectionid + '-section-' + sectionsection).attr('src');

            if (!hide) {
                var parentid = that.closest('li').parent().closest('li').attr('id');
                // Trigger hide event on all siblings.
                $.each($('#' + parentid + ' .flexcontrol.level-' + level), function(index, value) {
                    if ($(value).attr('id') != that.attr('id')) {
                        $(value).trigger('click', true);
                    }
                });
            }

            /*
            if (($('#section-' + sectionsection + ' > div > div.section-content').css('visibility') === 'visible') ||
                        (hide === true)) {
                $('#section-' + sectionsection + ' > div > div.section-content').css('visibility', 'hidden');
                $('#section-' + sectionsection + ' > div > div.section-content').css('display', 'none');
                $('#section-' + sectionsection + ' > div > ul.flexsections').css('visibility', 'hidden');
                $('#section-' + sectionsection + ' > div > ul.flexsections').css('display', 'none');
                $('#section-' + sectionsection + ' > div > div.summary').css('visibility', 'hidden');
                $('#section-' + sectionsection + ' > div > div.summary').css('display', 'none');
                handlesrc = handlesrc.replace('expanded', 'collapsed');
                $('#control-' + sectionid + '-section-' + sectionsection).attr('src', handlesrc);
                hide = 1;
            } else {
                // Show section.
                $('#section-' + sectionsection + ' > div > div.section-content').css('visibility', 'visible');
                $('#section-' + sectionsection + ' > div > div.section-content').css('display', 'block');
                $('#section-' + sectionsection + ' > div > ul.flexsections').css('visibility', 'visible');
                $('#section-' + sectionsection + ' > div > ul.flexsections').css('display', 'block');
                $('#section-' + sectionsection + ' > div > div.summary').css('visibility', 'visible');
                $('#section-' + sectionsection + ' > div > div.summary').css('display', 'block');
                handlesrc = handlesrc.replace('collapsed', 'expanded');
                $('#control-' + sectionid + '-section-' + sectionsection).attr('src', handlesrc);
                hide = 0;

                // Scroll to this section.
                var offset = that.offset();
                offset.top -= 70;
                $('html, body').animate({
                    scrollTop: offset.top,
                    scrollLeft: 0
                });
            }
            */

            if (($('#section-' + sectionsection).hasClass('expanded')) ||
                        (hide === true)) {
                $('#section-' + sectionsection).addClass('collapsed');
                $('#section-' + sectionsection).removeClass('expanded');
                $('#section-' + sectionsection + ' > .content > .section-content').addClass('collpased');
                $('#section-' + sectionsection + ' > .content > .section-content').removeClass('expanded');
                handlesrc = handlesrc.replace('expanded', 'collapsed');
                $('#control-' + sectionid + '-section-' + sectionsection).attr('src', handlesrc);
                hide = 1;
            } else {
                // Show section.
                $('#section-' + sectionsection).addClass('expanded');
                $('#section-' + sectionsection).removeClass('collapsed');
                $('#section-' + sectionsection + ' > .content > .section-content').addClass('expanded');
                $('#section-' + sectionsection + ' > .content > .section-content').removeClass('collapsed');
                handlesrc = handlesrc.replace('collapsed', 'expanded');
                $('#control-' + sectionid + '-section-' + sectionsection).attr('src', handlesrc);
                hide = 0;

                // Scroll to this section.
                var offset = that.offset();
                offset.top -= 70;
                $('html, body').animate({
                    scrollTop: offset.top,
                    scrollLeft: 0
                });
            }

            url += '&hide=' + hide;

            $.get(url, function() {
            });

            return false;
        },

        processglobal: function(e) {
            e.stopPropagation();
            e.preventDefault();
            var that = $(this);

            var regex = /flexsections-control-([a-z]+)/;
            var matchs = regex.exec(that.attr('id'));
            var what = matchs[1];

            var url = config.wwwroot + '/theme/fordson_fel/sections/ajax/register.php?';
            url += 'id=' + M.course.id;
            url += '&what=' + what;

            switch (what) {
                case 'collapseall':
                    $('.section.sub').removeClass('expanded');
                    $('.section.sub').addClass('collapsed');
                    $('.section-content').addClass('collpased');
                    $('.section-content').removeClass('expanded');
                    /*
                    $('.section.sub > .content > .section-content').css('display', 'none');
                    $('.section.sub > .content > .section-content').css('visibility', 'hidden');
                    $('.section.sub > .content > .summary').css('display', 'none');
                    $('.section.sub > .content > .summary').css('visibility', 'hidden');
                    $('.section.sub > .content > .flexsections').css('display', 'none');
                    $('.section.sub > .content > .flexsections').css('visibility', 'hidden');
                    */
                    $('img.flexcontrol').attr('src', $('img.flexcontrol').attr('src').replace('expanded', 'collapsed'));
                    break;

                case 'expandall':
                    $('.section').removeClass('collapsed');
                    $('.section').addClass('expanded');
                    $('.section-content').addClass('expanded');
                    $('.section-content').removeClass('collapsed');
                    /*
                    $('.section.sub > .content > .section-content').css('display', 'block');
                    $('.section.sub > .content > .section-content').css('visibility', 'visible');
                    $('.section.sub > .content > .summary').css('display', 'block');
                    $('.section.sub > .content > .summary').css('visibility', 'visible');
                    $('.section.sub >.content > .flexsections').css('display', 'block');
                    $('.section.sub >.content > .flexsections').css('visibility', 'visible');
                    */
                    $('img.flexcontrol').attr('src',$('img.flexcontrol').attr('src').replace('collapsed', 'expanded'));
                    break;

                case 'reset':
                    $('.section').removeClass('collapsed');
                    $('.section').addClass('expanded');
                    $('.section-content').removeClass('expanded');
                    $('.section-content').addClass('collapsed');
                    // Open all.
                    /*
                    $('.section >.content > .section-content').css('display', 'none');
                    $('.section >.content > .section-content').css('visibility', 'hidden');
                    $('.section >.content > .summary').css('display', 'block');
                    $('.section >.content > .summary').css('visibility', 'visible');
                    $('.section >.content > .flexsections').css('display', 'block');
                    $('.section >.content > .flexsections').css('visibility', 'visible');
                    */
                    // Close leaves.
                    /*
                    $('.section.isleaf >.content > .section-content').css('display', 'none');
                    $('.section.isleaf >.content > .section-content').css('visibility', 'hidden');
                    */
                    $('.section.isleaf').addClass('expanded');
                    $('.section.isleaf').removeClass('collapsed');

                    // $('.section.isleaf >.content > .summary').css('display', 'none');
                    // $('.section.isleaf >.content > .summary').css('visibility', 'hidden');
                    /*
                    // Leaves should not have subsections.
                    $('.section.isleaf >.content > .flexsections').css('display', 'none');
                    $('.section.isleaf >.content > .flexsections').css('visibility', 'hidden');
                    */
            }

            // Update positions server side.
            $.get(url);
        }
    };

    return flexsection_control;

});

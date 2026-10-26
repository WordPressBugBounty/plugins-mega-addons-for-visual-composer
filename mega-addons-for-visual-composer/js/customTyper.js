// Typed Text
jQuery(document).ready(function($) {
    jQuery('.type-wrap').each(function(index, el) {
        var wrapper = $(this);
        var typed = wrapper.find('.typed');
        var shahzaib_cont = wrapper.find('.typed-strings');
        var accessible_text = wrapper.find('.texttyper-accessible-text');
        var reduced_motion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var typespeed = $(this).data('typespeed');
        var backspeed = $(this).data('backspeed');
        var loop = false;
        var strings_text = shahzaib_cont.children().map(function() {
            return $.trim($(this).text());
        }).get().join(' ');

        // Keep one stable, non-live text representation for assistive technology.
        accessible_text.text(strings_text);
        shahzaib_cont.attr('aria-hidden', 'true');
        typed.attr('aria-hidden', 'true');

        if (reduced_motion) {
            wrapper.addClass('texttyper-reduced-motion');
            return;
        }

        if($(this).attr('data-loop') == ''){
            loop = true;
        } else {
            loop = false;
        }
        // console.log(loop);
        typed.typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: shahzaib_cont,
            typeSpeed: parseInt(typespeed),
            backDelay: parseInt(backspeed),
            loop: loop,
            showCursor: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: loop,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        
        
    });

    /*jQuery(".reset").click(function(){
        $("#typed").typed('reset');
    });*/

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }
});

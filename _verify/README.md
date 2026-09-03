# Conversion baseline

`baseline-investors.html` is the exact HTML the old JavaScript renderer
(`app.js` template layer) produced for `/investors`. It is kept so the investor
landing page can be proven unchanged after the doctor pages were removed.

To check:

    php -S 127.0.0.1:8000 router.php

then in another shell:

    curl -s http://127.0.0.1:8000/investors | sed -n 's/.*<div id="app">\(.*\)<\/div>.*/\1/p' > /tmp/investors.html
    diff _verify/baseline-investors.html /tmp/investors.html

The only expected difference from the baseline is the removed
"For doctors" audience-switch link in the header and mobile nav.

Delete this folder once you are satisfied.

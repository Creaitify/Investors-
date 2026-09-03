<?php
/**
 * Component functions — ported 1:1 from the former app.js template layer.
 * Function names match the original JS so the two can be diffed side by side.
 * Every literal below is byte-identical to the JS original.
 */

function logo($placement = 'header')
{
    $source = '/assets/brand/finnovate-logo-brandkit-footer.png';
    return '<a href="/" class="logo logo-' . $placement . '" aria-label="Finnovate home"><img class="brand-logo-image" src="' . $source . '" alt="Finnovate, Be Financially Fit"></a>';
}

function button($text, $cls = 'button primary')
{
    $classes = preg_split('/\s+/', $cls);
    $arrow = (in_array('primary', $classes, true) || in_array('light', $classes, true))
        ? ''
        : '<span>' . ICONS['arrow'] . '</span>';
    return '<button class="' . $cls . '" data-open-modal>' . $text . $arrow . '</button>';
}

function themeToggle()
{
    return '<button class="theme-toggle" type="button" aria-label="Switch to dark mode"><span class="theme-toggle-icon" aria-hidden="true">☾</span><span class="theme-toggle-label">Dark mode</span></button>';
}

function reportVisual()
{
    return <<<HTML
<div class="report-visual reveal-scale" aria-label="Illustration of a financial health report"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="orbit orbit-three"></div><div class="report-sheet back-sheet"></div><div class="report-sheet"><div class="report-top"><span>FINNOVATE / PRIVATE</span></div><h3>Your financial<br>health report</h3><div class="score"><small>YOUR SCORE</small><strong data-live-score>76</strong><i>/100</i></div><div class="mini-bars" aria-label="Financial health chart"><span></span><span></span><span></span><span></span><span></span></div><div class="report-foot">Clarity is a strategy.</div></div><span class="floating-pill pill-a"><b>Goals</b></span><span class="floating-pill pill-b">✦ <b>Unbiased</b></span></div>
HTML;
}

function hero(array $data)
{
    $tickerSet = '';
    foreach (TICKER_ITEMS as $item) {
        $tickerSet .= '<span>' . $item . '</span>';
    }
    $theme = $data['theme'];
    $title = $data['title'];
    $copy = $data['copy'];
    $cta = button($data['cta']);
    $proof = $data['proof'] ? '<p class="trust-line">' . $data['proof'] . '</p>' : '';
    $visual = reportVisual();

    return <<<HTML
<main><section class="hero {$theme}"><div class="shell hero-grid"><div class="hero-copy"><h1>{$title}</h1><p class="lead">{$copy}</p><div class="hero-actions">{$cta}<a href="#how" class="text-link">See how it works <span>↓</span></a></div>{$proof}</div>{$visual}</div><section class="ticker" aria-label="Areas covered in your financial plan"><div class="ticker-intro"><strong>Every part, in one view.</strong></div><div class="ticker-window"><div class="ticker-track"><div class="ticker-set">{$tickerSet}</div><div class="ticker-set" aria-hidden="true">{$tickerSet}</div></div></div></section></section>
HTML;
}

function reportJourneySection()
{
    $pages = '';
    for ($index = 0; $index < 12; $index++) {
        $page = $index + 1;
        $number = str_pad((string) $page, 2, '0', STR_PAD_LEFT);
        $initialClass = $index === 0 ? 'is-active' : ($index < 4 ? 'is-next-' . $index : '');
        $hidden = $index === 0 ? 'false' : 'true';
        $loading = $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"';
        $pages .= '<figure class="report-slide ' . $initialClass . '" data-report-page="' . $index . '" aria-hidden="' . $hidden . '"><img src="/assets/reports/financial-fitness-page-' . $number . '.webp" alt="Financial fitness report page ' . $page . ' of 12" ' . $loading . ' decoding="async"><span class="report-privacy-mask mask-one" aria-hidden="true"></span><span class="report-privacy-mask mask-two" aria-hidden="true"></span><span class="report-privacy-mask mask-three" aria-hidden="true"></span></figure>';
    }

    $processCards = '';
    foreach (PROCESS_STEPS as $index => $step) {
        $highlight = $index === 6 ? ' fleet-card-highlight' : '';
        $processCards .= '<article class="fleet-card' . $highlight . '" data-fleet-step="' . $index . '"><span class="fleet-number">' . ($index + 1) . '</span><h3>' . $step[0] . '</h3><p>' . $step[1] . '</p></article>';
    }

    $doctorClass = '';
    $downloadCta = button('Get Your Report - 999', 'button primary report-download-button');

    return <<<HTML
<section id="how" class="report-journey {$doctorClass}"><div class="shell"><section class="report-process"><div class="report-process-heading reveal"><h2>How we build your<br><em>Financial Fitness Report</em></h2><p>See how we turn your numbers into a clear score, insights, and a focused action plan.</p></div><div class="process-fleet" aria-label="Eight step financial report process">{$processCards}</div></section><div class="report-preview-heading reveal"><h2>Preview your<br><em>Financial Fitness Report</em></h2><p>The same 9-page PDF your advisor prepares is based entirely on your numbers, not templates.</p></div><div class="report-journey-grid"><div class="report-phone-carousel is-playing reveal-scale" data-report-carousel aria-label="Twelve page financial fitness report preview"><div class="report-phone-stage"><div class="report-phone-shell" aria-hidden="true"><span class="report-phone-speaker"></span><span class="report-phone-home"></span></div><div class="report-slide-deck">{$pages}</div></div></div><div class="report-download-cta reveal">{$downloadCta}</div></div></div></section>
HTML;
}

function nextActionsSection()
{
    $doctorClass = '';

    return <<<HTML
<section class="investor-next-actions{$doctorClass}"><div class="shell"><div class="next-actions-heading reveal"><h2>What will you do, in 3 steps</h2></div><div class="next-actions-card reveal" role="list" aria-label="What you will do in three steps"><div class="next-actions-line" aria-hidden="true"></div><article class="next-action-step" role="listitem"><span class="next-action-number">1</span><div class="next-action-icon"><svg class="na-art na-art--checkup" viewBox="0 0 132 132" aria-hidden="true" focusable="false"><path class="ln-faint" data-draw="long" pathLength="1" d="M66 13a53 53 0 1 1 0 106a53 53 0 1 1 0-106"/><path class="ln-faint" pathLength="1" d="M66 7v9M66 116v9M7 66h9M116 66h9"/><path class="ln" pathLength="1" d="M45 30h42M45 102h42"/><path class="f-paper" d="M51 30h30c0 15-15 21-15 36s15 21 15 36H51c0-15 15-21 15-36s-15-21-15-36z"/><path class="f-mint" d="M56 36h20c0 10-10 15-10 22 0-7-10-12-10-22z"/><path class="f-green" d="M56 96c0-9 10-13 10-13s10 4 10 13z"/><path class="ln-accent na-grain" d="M66 69V80"/><path class="ln" data-draw="long" pathLength="1" d="M51 30c0 15 15 21 15 36s-15 21-15 36M81 30c0 15-15 21-15 36s15 21 15 36"/></svg></div><div class="next-action-body"><h3>Start Your Financial Checkup</h3><p>Pay ₹999 securely and begin your Financial Fitness Checkup.</p></div></article><article class="next-action-step" role="listitem"><span class="next-action-number">2</span><div class="next-action-icon"><svg class="na-art na-art--snapshot" viewBox="0 0 132 132" aria-hidden="true" focusable="false"><path class="ln-faint" pathLength="1" d="M20 34V20h14M112 34V20H98M20 98v14h14M112 98v14H98"/><path class="f-paper" d="M38 24h40l18 18v66H38z"/><path class="ln" data-draw="long" pathLength="1" d="M38 24h40l18 18v66H38z"/><path class="ln" pathLength="1" d="M78 24v18h18"/><rect class="f-green" x="48" y="53.5" width="10" height="10" rx="3"/><path class="tick" d="M50.7 58.7l2.2 2.2 4.6-5.2"/><path class="ln-faint na-row na-seq-1" pathLength="1" d="M64 58.5h30"/><rect class="f-green" x="48" y="67.5" width="10" height="10" rx="3"/><path class="tick" d="M50.7 72.7l2.2 2.2 4.6-5.2"/><path class="ln-faint na-row na-seq-2" pathLength="1" d="M64 72.5h30"/><rect class="ln-faint box" x="48" y="81.5" width="10" height="10" rx="3"/><path class="ln-faint na-row na-seq-3" pathLength="1" d="M64 86.5h18"/><g class="na-lens"><circle class="f-glass" cx="94" cy="92" r="15"/><path class="ln-accent" data-draw="long" pathLength="1" d="M94 77a15 15 0 1 1 0 30a15 15 0 1 1 0-30"/><path class="ln-accent" pathLength="1" d="M105 103l11 11"/><path class="ln-faint" pathLength="1" d="M87 88a8 8 0 0 1 6-4"/></g></svg></div><div class="next-action-body"><h3>Share Your Financial Snapshot</h3><p>You fill a short form (or get a callback). Our team reviews your numbers within 24-48 hours.</p></div></article><article class="next-action-step" role="listitem"><span class="next-action-number">3</span><div class="next-action-icon"><svg class="na-art na-art--score" viewBox="0 0 132 132" aria-hidden="true" focusable="false"><path class="gauge-track" data-draw="long" pathLength="1" d="M22 78a44 44 0 0 1 88 0"/><path class="gauge-fill" data-draw="long" pathLength="1" d="M22 78a44 44 0 0 1 66-38"/><path class="ln-faint" pathLength="1" d="M66 24v8M31 39l5 6M101 39l-5 6"/><g class="na-needle"><path class="ln" pathLength="1" d="M66 78L89 55"/></g><circle class="f-green" cx="66" cy="78" r="4.5"/><path class="ln-accent na-check na-seq-1" pathLength="1" d="M40 96l3.5 3.5 6-7"/><path class="ln-faint na-row na-seq-1" pathLength="1" d="M58 97h34"/><path class="ln-accent na-check na-seq-2" pathLength="1" d="M40 110l3.5 3.5 6-7"/><path class="ln-faint na-row na-seq-2" pathLength="1" d="M58 111h34"/><path class="ln-accent na-check na-seq-3" pathLength="1" d="M40 124l3.5 3.5 6-7"/><path class="ln-faint na-row na-seq-3" pathLength="1" d="M58 125h22"/></svg></div><div class="next-action-body"><h3>Review Your Financial Position</h3><p>Receive your Financial Fitness Score, 9-page personalised report and three priority actions, then walk through them in a 45-minute one-to-one expert review.</p></div></article></div></div></section>
HTML;
}

function pricing($price, $subtitle, $label)
{
    $check = ICONS['check'];
    $cta = button($label, 'button light');

    return <<<HTML
<section class="pricing"><div class="shell pricing-card"><div><h2>{$price}</h2><p>{$subtitle}</p></div><div class="price-includes"><span>{$check} Clear next steps</span><span>{$check} Private & confidential</span><span>{$check} No product sales</span></div><div>{$cta}</div></div></section>
HTML;
}

function faq()
{
    $qs = INVESTOR_FAQS;
    $prefix = 'investor';
    $plus = ICONS['plus'];

    $items = '';
    foreach ($qs as $i => $q) {
        $items .= '<article class="faq-item"><button type="button" aria-expanded="false" aria-controls="' . $prefix . '-faq-answer-' . $i . '">' . $q[0] . '<span aria-hidden="true">' . $plus . '</span></button><p id="' . $prefix . '-faq-answer-' . $i . '">' . $q[1] . '</p></article>';
    }

    $section = <<<HTML
<section class="faq shell plain-faq faq-{$prefix}"><div class="faq-copy"><h2>Clarity starts with a good question.</h2></div><div class="faq-list">{$items}</div></section>
HTML;

    return $section;
}

function chatbot()
{
    $close = ICONS['close'];
    $chat = ICONS['chat'];

    return <<<HTML
<div class="chat-wrap"><div class="chat-pop"><button class="chat-x" aria-label="Close chat">{$close}</button><p><b>Need a quick answer?</b><br>Ask about the checkup, pricing or how Finnovate works.</p><div class="quick-questions"><button>What do I get?</button><button>Is it really unbiased?</button></div></div><button class="chat-button" aria-label="Open chat"><span>{$chat}</span><i></i></button></div>
HTML;
}

function modal()
{
    $options = INVESTOR_MODAL_OPTIONS;
    $enquiryLabel = 'What would you like us to look at?';
    $close = ICONS['close'];

    $optionMarkup = '';
    foreach ($options as $option) {
        $optionMarkup .= '<button class="custom-select-option" type="button" role="option" aria-selected="false" data-value="' . $option . '"><span>' . $option . '</span><i aria-hidden="true">✓</i></button>';
    }

    return <<<HTML
<dialog class="modal"><button class="modal-close" aria-label="Close">{$close}</button><h2>A clear next step<br>starts here.</h2><form novalidate><label>Full name<input name="name" data-validate="name" autocomplete="name" placeholder="Enter your full name" required><small class="field-error" hidden></small></label><div class="modal-field"><span class="modal-field-label">Phone number</span><div class="phone-input"><span class="phone-prefix">+91</span><input name="phone" type="tel" inputmode="numeric" maxlength="10" data-validate="phone" autocomplete="tel-national" placeholder="10-digit mobile number" aria-label="Phone number" required></div><small class="field-error" hidden></small></div><label>Email<input name="email" type="email" data-validate="email" autocomplete="email" placeholder="you@example.com" required><small class="field-error" hidden></small></label><label>City<input name="city" data-validate="city" autocomplete="address-level2" placeholder="Your city (e.g. Mumbai)" required><small class="field-error" hidden></small></label><div class="modal-field"><span class="modal-field-label">{$enquiryLabel}</span><div class="custom-select" data-custom-select><button class="custom-select-trigger" type="button" aria-haspopup="listbox" aria-expanded="false" aria-controls="enquiry-options"><span>What would you like us to look at?</span><i aria-hidden="true"></i></button><div class="custom-select-menu" id="enquiry-options" role="listbox" aria-label="{$enquiryLabel}" hidden>{$optionMarkup}</div><input class="custom-select-value" type="hidden" name="enquiry" value=""></div></div><button class="button primary" type="submit">Request a callback</button><p class="form-note">Demo form only. No information is submitted.</p></form></dialog>
HTML;
}

function appShell(array $data, $inner)
{
    $promiseItems = '';
    foreach (FOOTER_PROMISES as $item) {
        $promiseItems .= '<li>' . $item . '</li>';
    }

    $footerLogo = logo('footer');
    $footer = <<<HTML
<footer class="doctor-footer"><div class="shell doctor-footer-grid footer-without-cta"><div><div class="doctor-footer-logo">{$footerLogo}</div><p>A structured, data driven methodology for your financial health.</p><small>⌾ &nbsp; SEBI-Registered Investment Adviser (SEBI Registration Number: INA000010996)</small></div><nav><p>DIAGNOSIS</p><a href="#how">How it works</a><a href="#stories">Stories</a><a href="#why">Our approach</a></nav><div><p>OUR PROMISES</p><ul>{$promiseItems}</ul></div></div><div class="shell doctor-footer-bottom"><p>Finnovate Financial Services Pvt. Ltd. Investments are subject to market risks. Please read all related documents carefully before investing.</p><div><a href="#">Privacy Policy</a><a href="#">Terms of Service</a><span>© 2026 Finnovate</span></div></div></footer>
HTML;

    $headerLogo = logo();
    $toggleOne = themeToggle();
    $navCta = button('Talk to us', 'button nav-cta');
    $toggleTwo = themeToggle();
    $mobileCta = button('Talk to us', 'button mobile-nav-cta');
    $chat = chatbot();
    $dialog = modal();

    return <<<HTML
<header class="nav"><div class="shell nav-inner">{$headerLogo}<nav><a href="#how">How it works</a><a href="#why">Why Finnovate</a><a href="#stories">Stories</a></nav><div class="nav-actions">{$toggleOne}{$navCta}</div><button class="menu" type="button" aria-label="Open navigation" aria-controls="mobile-navigation" aria-expanded="false"><span class="menu-icon" aria-hidden="true">☰</span></button></div><div class="mobile-nav" id="mobile-navigation" aria-hidden="true"><nav><a href="#how">How it works</a><a href="#why">Why Finnovate</a><a href="#stories">Stories</a></nav>{$toggleTwo}{$mobileCta}</div></header>{$inner}{$footer}{$chat}{$dialog}
HTML;
}

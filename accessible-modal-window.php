<?php
/**
 * Created by Karina Hinkelthein
 * 07.02.2015
 */
error_reporting(0);

include('php/utils.php');

$title = 'Keyboard accessible modal window ' . getTitleDefault();;
$extraJs = 'modals.js';
$extraCss = 'modals.css';

include('templates/head.phtml');
include('templates/header.phtml');
?>

<main>
    <section id="accessible-modal-window">
        <strong>[-- NOT FINISHED! --]</strong>

        <h1>Keyboard accessible modal window</h1>

        <p>
            Mostly modal windows are a mess regarding accessibility. I'm trying to build one that is practicable at least for
            keyboard users. As I do not invent this, the sources are named in the text and listed at the end of it.
        </p>

        <p>What the modal basically should provide is best described by Marcy Sutton in her blog post "How I Audit a Website for Accessibility":</p>

        <blockquote>
            <p>
                when a modal window opens, focus should move from the element that triggered it to an element inside of
                the modal, preferably a close button. This enables a keyboard or screen reader user to easily tab and
                find their way to new content on the screen. When the modal window is closed, focus should be sent
                back to the triggering element.
            </p>
            <footer>
                <cite>
                    <a href="http://substantial.com/blog/2014/07/22/how-i-audit-a-website-for-accessibility/">
                        Marcy Sutton - How I Audit a Website for Accessibility
                    </a>
                </cite>
            </footer>
        </blockquote>

        <p>
            Another big issue is big modals on tiny screens. The most common technique as far as I have encountered it,
            is to just set the modal to <code>position: fixed;</code>. But with that one never reaches the end of large contents,
            while the main document in the background keeps scrolling.
        </p>

        <p>
            As a bonus (more or less for myself) I'll try out one appearing effect by Manoela Ilic found on
            <a href="http://tympanus.net/codrops/2013/06/25/nifty-modal-window-effects/">tympanus.net</a>.
        </p>

        <div class="info-box">
            <strong>Please note:</strong>
            <ul>
                <li>
                    The explanation how to make a modal accessible can be found in the
                    <a href="http://www.smashingmagazine.com/2014/09/15/making-modal-windows-better-for-everyone/">Smashing Magazine article by Scott O'Hara</a>,
                    so I won't repeat all that here. This is basically completely what I used to build the modal functionality.
                </li>
                <li>
                    As this is a place for me to try new technologies, not everything will work in every browser - especially Internet Explorer < v11.
                </li>
            </ul>
        </div>

        <form action="" method="" name="modal-demo-form">
            <fieldset>
                <legend>Demo Form which includes a modal window.</legend>

                <ul class="form-list cf">
                    <li>
                        <label for="input-1">Input No. 1</label>
                        <input type="text" name="input-1" id="input-1" />
                    </li>
                    <li>
                        <button type="button" class="btn-inline" data-trigger="modal" data-modal="demo-modal">open modal</button>
                    </li>
                    <li>
                        <label for="input-2">Input No. 2</label>
                        <input type="text" name="input-2" id="input-2" />
                    </li>
                    <li>
                        <label for="input-3">Input No. 3</label>
                        <input type="text" name="input-3" id="input-3" />
                    </li>
                    <li>
                        <label for="input-4">Input No. 4</label>
                        <input type="text" name="input-4" id="input-4" />
                    </li>
                    <li>
                        <label for="input-5">Input No. 5</label>
                        <input type="text" name="input-5" id="input-5" />
                    </li>
                    <li>
                        <label for="input-6">Input No. 6</label>
                        <input type="text" name="input-6" id="input-6" />
                    </li>
                </ul>
            </fieldset>

            <p class="cf"><button type="submit">Submit Form</button></p>
        </form>

        <footer>
            <dl>
                <dt>Sources:</dt>
                <dd>
                    <ul class="link-list">
                        <li>
                            <a href="http://substantial.com/blog/2014/07/22/how-i-audit-a-website-for-accessibility/">
                                Marcy Sutton - How I Audit a Website for Accessibility
                            </a>
                        </li>
                        <li>
                            <a href="http://www.smashingmagazine.com/2014/09/15/making-modal-windows-better-for-everyone/">
                                Scott O'Hara - Making Modal Windows Better For Everyone
                            </a>
                        </li>
                        <li>
                            <a href="http://tympanus.net/codrops/2013/06/25/nifty-modal-window-effects/">
                                Manoela Ilic - Nifty Modal Window Effects
                            </a>
                        </li>
                    </ul>
                </dd>
            </dl>
        </footer>
    </section>
</main>

<div id="demo-modal" class="modal-container" aria-hidden="true" aria-labelledby="modal-heading">
    <div class="modal-content-wrapper">
        <button type="button" class="btn-inline btn-close modal-close" aria-label="close">
            <span class="sr-only">close</span>x
        </button>

        <div class="modal-content">
            <form action="" method="post" name="modal-inner-form">
                <fieldset>
                    <legend id="modal-heading">Form inside the modal</legend>

                    <ul class="form-list">
                        <li>
                            <label for="modal-input-1">Modal input 1</label>
                            <input type="text" name="modal-input-1" id="modal-input-1" />
                        </li>
                        <li>
                            <label for="modal-input-2">Modal input 2</label>
                            <input type="text" name="modal-input-2" id="modal-input-2" />
                        </li>
                    </ul>
                </fieldset>

                <p class="cf"><button type="submit">Submit Modal Form</button></p>
            </form>
        </div>
    </div>
</div>

<?php include('templates/footer.phtml'); ?>
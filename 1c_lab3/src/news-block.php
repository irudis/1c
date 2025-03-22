
<article class="padding-large">
    <div class="grid no-space">
        <div class="s4 padding-large">
            <img class="responsive large" src="<?= $item["img"] ?>">
        </div>
        <div class="s8 padding">
            <article class="small">
                <h5>
                    <?= $item["title"] ?>
                </h5>
                <p>
                    <?= $item["s_text"] ?>
                </p>
                <p class="right-align small-text" > 
                    <?= $item["date"] ?>
                </p>
            </article>
            <footer>
                <a class="button border large right-round top-round">
                    Читать далее <i>arrow_forward</i>
                </a>                                  
            </footer>
        </div>
    </div>
</article>
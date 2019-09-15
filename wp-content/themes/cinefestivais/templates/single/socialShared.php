<div class="socialShared-container singlePg-container">
    <ul class="socialShared">
        <li>
            <span class="socialShared-item" onclick="goToComments()">
                <svg class="icon icon-bubble">
                    <use xlink:href="#icon-bubble"></use>
                </svg>
            </span>
        </li>

        <li class="socialShared-divisor">
            <span class="socialShared-item socialShared-item--shared">
                <svg class="icon icon-share-alt">
                    <use xlink:href="#icon-share-alt"></use>
                </svg>
                <span class="socialShared-item--shared-text">
                    COMPARTILHE
                </span>
            </span>
        </li>

        <li>
            <a class="socialShared-item socialShared-item-circle" aria-label="Compartilhe no Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Compartilhe no Facebook">    
                <svg class="icon icon-facebook">
                    <use xlink:href="#icon-facebook"></use>
                </svg>
            </a>
        </li>

        <?php 
            $content = get_the_excerpt();
            $conteudo = substr($content, 0, 70) . '...';                        
        ?>
        <li>
        <a class="socialShared-item socialShared-item-circle" aria-label="Compartilhe no Twitter" 
            href="https://twitter.com/intent/tweet?url=<?php the_permalink()?>&amp;text=<?php echo $conteudo; ?>&amp;via=artigo19" 
            onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" 
            title="Compartilhe no Twitter">
                <svg class="icon icon-twitter">
                    <use xlink:href="#icon-twitter"></use>
                </svg>
            </a>
        </li>

        <li>
            <a href="mailto:?subject=Cinefestivais&amp;body=<?php the_title(); echo " "; the_permalink()?>" target="_top" class="socialShared-item socialShared-item-circle">
                <svg class="icon icon-envelope">
                    <use xlink:href="#icon-envelope"></use>
                </svg>
            </a>
        </li>
        
        <li class="is-tablet">
            <a class="socialShared-item socialShared-item-circle" href="https://wa.me/?text=<?php the_title(); echo " "; the_permalink()?>" target="_blank" data-action="share/whatsapp/share">	    
                <svg class="icon icon-whatsapp">
                    <use xlink:href="#icon-whatsapp"></use>
                </svg>
            </a>
        </li>

        <li class="is-mobile">
            <a class="socialShared-item socialShared-item-circle"  href="whatsapp://send?text=<?php the_title(); echo " "; the_permalink()?>" target="_blank" title="Compartilhar via Whatsapp" 
                data-href="whatsapp://send?text=<?php the_title(); echo " "; the_permalink()?>">	    
                <svg class="icon icon-whatsapp">
                    <use xlink:href="#icon-whatsapp"></use>
                </svg>
            </a>
        </li>
    </ul>
</div>
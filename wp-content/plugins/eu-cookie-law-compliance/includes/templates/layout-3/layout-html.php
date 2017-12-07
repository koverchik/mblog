

<div class="tplis-cl-cookies<?php echo $this->is_btn_refuse ? ' tplis-cl-is-btn-refuse' : ''; ?>">
    <div class="tplis-cl-cookies-text">
        <div class="tplis-cl-cookies-head">
            <h4>{cookie_title}</h4>
        </div>
        <div class="tplis-cl-cookies-content-text">
			<div class="tplis-cl-message">{cookie_message}</div>
        </div>
    </div>
    <div class="tplis-cl-cookies-buttons">
		
        <div class="tplis-cl-row">
            <a class="tplis-cl-button-image" role="button" href="#" <?php echo tplis_cl_add_attr_event( 'click', 'accept' ); ?>>
                <p class="tplis-cl-button-accept">{cookie_accept_text}</p>
            </a>
        </div>
		
		<?php if ( $this->is_btn_refuse ): ?>
        <div class="tplis-cl-row">
            <a class="tplis-cl-button-image tplis-cl-refuse" role="button" href="#" <?php echo tplis_cl_add_attr_event( 'click', 'refuse' ); ?>>
                <p class="tplis-cl-button-refuse">{cookie_refuse_text}</p>
            </a>
        </div>
		<?php endif; ?>
    </div>
</div>
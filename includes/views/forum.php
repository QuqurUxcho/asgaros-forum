<?php

if (!defined('ABSPATH')) exit;

if (!is_user_logged_in()) {
    echo '<div class="info">'.__('You need to login in order to create posts and topics.', 'asgaros-forum').'&nbsp;<a href="'.wp_login_url(get_permalink()).'">&raquo; '.__('Login', 'asgaros-forum').'</a></div>';
}

?>

<div>
    <div class="pages">
        <?php if ($counter_normal > 0) {
            echo $this->pageing($this->table_threads);
        } ?>
    </div>
    <div class="forum-menu"><?php echo $this->forum_menu('forum'); ?></div>
    <div class="clear"></div>
</div>

<?php if ($counter_total > 0) { ?>
    <div class="title-element"><?php echo $this->get_name($this->current_forum, $this->table_forums); ?></div>
    <div class="content-element">
        <?php if ($sticky_threads && !$this->current_page) { ?>
            <div class="bright"><?php _e('Sticky Threads', 'asgaros-forum'); ?></div>
            <?php foreach ($sticky_threads as $thread) { ?>
                <div class="thread">
                    <div class="thread-status"><?php $this->get_thread_image($thread->id, $thread->status); ?></div>
                    <div class="thread-name">
                        <strong><a href="<?php echo $this->get_link($thread->id, $this->url_thread); ?>"><?php echo $this->cut_string($thread->name); ?></a></strong>
                        <small><?php _e('Created by:', 'asgaros-forum'); ?> <i><?php echo $this->get_username($this->get_thread_starter($thread->id)); ?></i></small>
                    </div>
                    <div class="thread-stats">
                        <small><?php _e('Answers', 'asgaros-forum'); ?>: <?php echo (int) ($this->count_elements($thread->id, $this->table_posts) - 1); ?></small>
                        <small><?php _e('Views', 'asgaros-forum'); ?>: <?php echo (int) $thread->views; ?></small>
                    </div>
                    <div class="thread-poster"><?php echo $this->get_lastpost_in_thread($thread->id); ?></div>
                </div>
            <?php }
            if ($counter_normal > 0) { ?>
                <div class="bright"></div>
            <?php }
        }

        foreach ($threads as $thread) { ?>
            <div class="thread">
                <div class="thread-status"><?php $this->get_thread_image($thread->id, $thread->status); ?></div>
                <div class="thread-name">
                    <strong><a href="<?php echo $this->get_link($thread->id, $this->url_thread); ?>"><?php echo $this->cut_string($thread->name); ?></a></strong>
                    <small><?php _e('Created by:', 'asgaros-forum'); ?> <i><?php echo $this->get_username($this->get_thread_starter($thread->id)); ?></i></small>
                </div>
                <div class="thread-stats">
                    <small><?php _e('Answers', 'asgaros-forum'); ?>: <?php echo (int) ($this->count_elements($thread->id, $this->table_posts) - 1); ?></small>
                    <small><?php _e('Views', 'asgaros-forum'); ?>: <?php echo (int) $thread->views; ?></small>
                </div>
                <div class="thread-poster"><?php echo $this->get_lastpost_in_thread($thread->id); ?></div>
            </div>
        <?php } ?>
    </div>

    <div>
        <div class="pages">
            <?php if ($counter_normal > 0) {
                echo $this->pageing($this->table_threads);
            } ?>
        </div>
        <div class="forum-menu"><?php echo $this->forum_menu('forum'); ?></div>
        <div class="clear"></div>
    </div>
<?php } else { ?>
    <div class="notice"><?php _e('There are no threads yet!', 'asgaros-forum'); ?></div>
<?php } ?>

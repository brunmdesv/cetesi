<?php
/**
 * Template part para comentários
 *
 * @package Cetesi
 * @since 1.0.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                printf(
                    esc_html__( 'Um comentário em &ldquo;%s&rdquo;', 'cetesi' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html( _nx( '%1$s comentário em &ldquo;%2$s&rdquo;', '%1$s comentários em &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'cetesi' ) ),
                    number_format_i18n( $comments_number ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 50,
            ) );
            ?>
        </ol>

        <?php
        the_comments_navigation( array(
            'prev_text' => esc_html__( 'Comentários anteriores', 'cetesi' ),
            'next_text' => esc_html__( 'Comentários mais recentes', 'cetesi' ),
        ) );
        ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comentários estão fechados.', 'cetesi' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'title_reply'          => esc_html__( 'Deixe um comentário', 'cetesi' ),
        'title_reply_to'       => esc_html__( 'Deixe uma resposta para %s', 'cetesi' ),
        'cancel_reply_link'    => esc_html__( 'Cancelar resposta', 'cetesi' ),
        'label_submit'         => esc_html__( 'Enviar comentário', 'cetesi' ),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comentário', 'cetesi' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="' . esc_attr__( 'Digite seu comentário...', 'cetesi' ) . '"></textarea></p>',
        'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Seu endereço de email não será publicado.', 'cetesi' ) . '</span>' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
        'comment_notes_after'  => '',
        'fields'               => array(
            'author' => '<p class="comment-form-author"><label for="author">' . esc_html__( 'Nome', 'cetesi' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . ( $req ? ' required="required"' : '' ) . ' placeholder="' . esc_attr__( 'Seu nome', 'cetesi' ) . '" /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'cetesi' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . ( $req ? ' required="required"' : '' ) . ' placeholder="' . esc_attr__( 'Seu email', 'cetesi' ) . '" /></p>',
            'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Site', 'cetesi' ) . '</label><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" placeholder="' . esc_attr__( 'Seu site (opcional)', 'cetesi' ) . '" /></p>',
        ),
    ) );
    ?>

</div>

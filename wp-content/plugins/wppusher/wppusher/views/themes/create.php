<?php

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

?><h2>Install New Theme</h2>

<form action="" method="POST">
    <?php wp_nonce_field('install-theme'); ?>
    <input type="hidden" name="wppusher[action]" value="install-theme">
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label>Repository host</label>
                </th>
                <td>
                    <input id="radio-gh" name="wppusher[type]" type="radio" value="gh" checked> <label for="radio-gh"><i class="fa fa-github"></i> GitHub &nbsp;</label>
                    <input id="radio-bb" name="wppusher[type]" type="radio" value="bb" <?php if (isset($_POST['wppusher']['type']) && $_POST['wppusher']['type'] === 'bb') echo 'checked'; ?>> <label for="radio-bb"><i class="fa fa-bitbucket"></i> Bitbucket &nbsp;</label>
                    <input id="radio-gl" name="wppusher[type]" type="radio" value="gl" <?php if (isset($_POST['wppusher']['type']) && $_POST['wppusher']['type'] === 'gl') echo 'checked'; ?>> <label for="radio-gl"><i class="fa fa-git-square"></i> GitLab &nbsp;</label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Theme repository</label>
                </th>
                <td>
                    <input name="wppusher[repository]" type="text" class="regular-text" value="<?php echo (isset($_POST['wppusher']['repository'])) ? $_POST['wppusher']['repository'] : ''; ?>">
                    <p class="description">Example: wppusher/awesome-wordpress-theme</p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Repository branch</label>
                </th>
                <td>
                    <input name="wppusher[branch]" type="text" class="regular-text" placeholder="master" value="<?php echo (isset($_POST['wppusher']['branch'])) ? $_POST['wppusher']['branch'] : ''; ?>">
                    <p class="description">Defaults to <strong>master</strong> if left blank</p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>Repository subdirectory</label>
                </th>
                <td>
                    <input name="wppusher[subdirectory]" type="text" class="regular-text" placeholder="Optional" value="<?php echo (isset($_POST['wppusher']['subdirectory'])) ? $_POST['wppusher']['subdirectory'] : ''; ?>">
                    <p class="description">Only relevant if your theme resides in a subdirectory of the repository.</p>
                    <p class="description">Example: <strong>awesome-theme</strong> or <strong>plugins/awesome-theme</strong></p>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <label><input type="checkbox" name="wppusher[private]" <?php if (isset($_POST['wppusher']['private'])) echo 'checked'; ?> <?php echo ($hasValidLicense) ? null : 'disabled'; ?>> <i class="fa fa-lock" aria-hidden="true"></i> Repository is private</label>
                    <?php if ( ! $hasValidLicense) { ?>
                        <p class="description">You need a license to use private repositories. <a href="http://wppusher.com#pricing">Get one here.</a></p>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label></label>
                </th>
                <td>
                    <label><input type="checkbox" name="wppusher[ptd]" <?php if (isset($_POST['wppusher']['ptd'])) echo 'checked'; ?>> <i class="fa fa-refresh" aria-hidden="true"></i> Push-to-Deploy</label>
                    <p class="description">Automatically update on every push. Read about setup <a target="_blank" href="https://github.com/wppusher/wppusher-documentation/blob/master/push-to-deploy.md">here</a>.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td>
                    <label><input type="checkbox" name="wppusher[dry-run]" <?php if (isset($_POST['wppusher']['dry-run'])) echo 'checked'; ?>> <i class="fa fa-link" aria-hidden="true"></i> Link installed theme</label>
                    <p class="description">Let WP Pusher take over an already installed theme</p>
                    <p class="description">Folder name <strong>must</strong> have the same name as repository</p>
                </td>
            </tr>
        </tbody>
    </table>
    <?php submit_button('Install theme'); ?>
</form>

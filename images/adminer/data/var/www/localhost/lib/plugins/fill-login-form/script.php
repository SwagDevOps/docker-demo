<script<?php echo nonce() ?>>
    document.addEventListener("DOMContentLoaded", function (event) {
        var dr = qs("option[value='<?php echo $this->system; ?>']");
        if (dr) {
            dr.selected = true;
        }

        <?php if(!empty($this->server)): ?>
        var s = qs("input[name='auth[server]']");

        s.value = "<?php echo $this->server ?>";
        s.setAttribute("readonly", "readonly");
        <?php endif ?>

        <?php if(!empty($this->name)): ?>
        var l = qs("input[name='auth[username]']");

        l.value = "<?php echo $this->name ?>";
        l.setAttribute("readonly", "readonly");
        <?php endif ?>

        <?php if(!empty($this->pass)): ?>
        var p = qs("input[name='auth[password]']");

        p.value = "<?php echo $this->pass ?>";
        p.setAttribute("readonly", "readonly");
        <?php endif ?>

        <?php if(!empty($this->database)): ?>
        var d = qs("input[name='auth[db]']");

        d.value = "<?php echo $this->database ?>";
        d.setAttribute("readonly", "readonly");
        <?php endif ?>
    });
</script>
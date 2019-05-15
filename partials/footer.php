<footer class="footer py-2 mt-5 text-light">
    <h3 class="text-center">Copyright <i class="far fa-copyright"></i> Valgritim <img id="valgritim" src="../images/valgritim.png" alt="logo"></h3>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js" integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
    $(function(){

        var liste = [
        "bleu",
        "bleached",
        "brut",
        "clair",
        "droit",
        "droit bleu",
        "droit clair",
        "droit noir",
        "droit bleached",
        "droit stone",
        "noir",
        "brut",
        "revert",
        "skinny",
        "skinny bleu",
        "skinny clair",
        "skinny noir",
        "skinny bleached",
        "skinny stone",
        "slim",
        "slim clair",
        "slim noir",
        "slim bleu",
        "slim bleached",
        "slim stone",
        "stone",
        "flare",
        "femme",
        "homme"
        ];

        $('#autocompletion').autocomplete({
        	source : liste,
            position: {
        		my: "right top",
        		at: "right bottom"
    }
        	
        });

    });
</script>
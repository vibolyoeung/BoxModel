# Require any additional compass plugins here.
# require "/Library/Ruby/Gems/1.8/gems/stitch-0.1.6/lib/stitch.rb";
# require "/Library/Ruby/Gems/1.8/gems/susy-1.0/lib/susy.rb";

http_path = "/"
css_dir = "../../Public/Css"
sass_dir = "Styles"
images_dir = "../../Public/Images"
javascripts_dir = "../../Public/Javascript"

#output_style = (environment == :production) ? :compressed : :expanded
output_style = :compressed
environment = :development
relative_assets = true
line_comments = false
color_output = false

add_import_path "bower_components/bootstrap-sass-twbs/vendor/assets/stylesheets"

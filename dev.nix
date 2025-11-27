{
  pkgs ? import <nixpkgs> {}
}:
pkgs.mkShell {
  buildInputs = [
    # Use PHP with extensions
    (pkgs.php.withExtensions (p: [
      p.gd
      p.imagick
      p.curl
      p.mbstring
      p.pdo_mysql
    ]))
    pkgs.phpPackages.composer
    pkgs.nodejs
    pkgs.mysql
  ];
}

var casper = require('casper').create({
	verbose: false,
	logLevel: 'info',
  pageSettings: { loadImages: true, loadPlugins: false	}
});

casper.start('https://zongl.info' + casper.cli.get('url'));

casper.then(function() {

		this.echo(this.fetchText('h1') + '*' + casper.cli.get('url') + '*' + this.getElementAttribute('#obsah img:nth-of-type(1)', 'src').split('/').reverse()[0] + '*' + this.fetchText('#obsah p:nth-of-type(2)').replace(/(\r\n|\n|\r)/gm,"") );
});

casper.run();

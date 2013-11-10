var path = require('path');

'use strict';

module.exports = function(grunt) {

  grunt.initConfig({
    pkg : grunt.file.readJSON('package.json'),
    cfg : grunt.file.readJSON('config.json'),
    bowerDirectory: require('bower').config.directory,

    assemble: {
      options: {
        plugins: ['assemble-contrib-contextual'],
        contextual: {
          dest: '_data/'
        },
        layoutdir: 'layouts',
        partials: ['includes/**/*'],
        assets: '<%= cfg.destination %>/<%= cfg.assets %>',
        ext: '.php',
        marked: {sanitize: false},
        prettify: {indent: 2}
      },
      site: {
        options: {layout: 'default.html'},
        files: [
          { expand: true, 
            cwd: 'templates/pages', 
            src: ['*'], dest: '<%= cfg.destination %>', 
            rename: function(dest, matchedSrcPath, options) {
              matchedSrcPath = path.basename(matchedSrcPath)
                .replace(path.extname(matchedSrcPath),'');
              if (matchedSrcPath === 'index') {
                matchedSrcPath = '';
              }
              matchedSrcPath = path.join(matchedSrcPath, 'index.php')
              return path.join(dest, matchedSrcPath);
            }
          }
        ]
      }
    },
    
    copy: {
      assets: {
        files: [
          { expand: true, cwd: '<%= cfg.assets %>', src: ['**'], dest: '<%= cfg.destination %>/<%= cfg.assets %>' },
          { expand: true, cwd: '<%= bowerDirectory %>', src: ['**'], dest: '<%= cfg.destination %>/<%= cfg.assets %>' }
          ]
      }
    },

    // Before generating any new files,
    // remove any previously-created files.
    clean: {
      all: ['<%= cfg.destination %>/**/*']
    }
  });

  // Load npm plugins to provide necessary tasks.
  grunt.loadNpmTasks('assemble');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');

  // Default task to be run.
  grunt.registerTask('default', ['clean', 'assemble', 'copy']);
};

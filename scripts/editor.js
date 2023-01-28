

wp.domReady( () => {

  // Remove unwanted default block styles
  const stylesToRemove = []

  // Add our custom block styles
  const stylesToAdd = [
    {
      "block": "core/cover",
      "styles": [
        {
          "name": "rounded",
          "label": "Rounded",
        }
      ]
    }
  ]


  if(stylesToRemove.length > 0) {
    stylesToRemove.forEach(({block, style}) => {
      wp.blocks.unregisterBlockStyle(block, style)
    })
  }

  if(stylesToAdd.length > 0) {
    stylesToAdd.forEach(({block, styles})=>{
      styles.forEach(style => {
        wp.blocks.registerBlockStyle(block, style)
      })
    })
  }

})

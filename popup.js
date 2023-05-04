const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const pane = document.getElementById('pane')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
  })
})

pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.chicken.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.chicken')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.dinuguan.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.dinuguan')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.bopis.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.bopis')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.adobong_pusit.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.adobong_pusit')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.sinigang_baboy.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.sinigang_baboy')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.sisig.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.sisig')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.bicol_express.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.bicol_express')
    closeModal(modal)
  })
})




pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.spaghetti.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.spaghetti')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.carbonara.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.carbonara')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.baked_mac.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.baked_mac')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.eggplant_omelette.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.eggplant_omelette')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.ginisang_upo.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.ginisang_upo')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.ginisang_monggo.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.ginisang_monggo')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.rice.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.rice')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.egg.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.egg')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.ham.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.ham')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.hotdog.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.hotdog')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.siomai.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.siomai')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.salad.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.salad')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.lemonade.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.lemonade')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.bluelemonade.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.bluelemonade')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.iced_tea.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.iced_tea')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.red_iced_tea.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.red_iced_tea')
    closeModal(modal)
  })
})

pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.cucumber_iced_tea.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.cucumber_iced_tea')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.mango_iced_tea.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.mango_iced_tea')
    closeModal(modal)
  })
})

pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.guyabano_iced_tea.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.guyabano_iced_tea')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.melon_juice.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.melon_juice')
    closeModal(modal)
  })
})



pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.gulaman.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.gulaman')
    closeModal(modal)
  })
})


pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.milo.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.milo')
    closeModal(modal)
  })
})


function openModal(modal) {
  if (modal == null) return
  modal.classList.add('active')
  pane.classList.add('active')
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  pane.classList.remove('active')
}
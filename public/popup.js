const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const pane = document.getElementById('pane')

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

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal)
  })
})

pane.addEventListener('click', () => {
  const modals = document.querySelectorAll('.foodDisplay.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.foodDisplay')
    closeModal(modal)
  })
})
